<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\License;
use App\Item;

class PlayController extends Controller
{
    public function play($slug, $key)
    {
        $item = Item::with('itemType', 'itemCategory')->where('url_segment', $slug)->firstOrFail();

        if (!$this->checkForLicense($item, $key, $this->getRefererDomain())) {
            return view('errors.expiredplay', [
                'ref_domain' => $this->getRefererDomain(),
                'item_url' => $item->getUrlPath()
            ]);
        }

        return view('frontend.gallery.play', compact($item));
    }

    private function getRefererDomain()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            return parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
        }

        return '';
    }

    private function checkForLicense($item, $key, $domain) : bool
    {
        $license = License::where('domain', $domain)
            ->where('item_id', $item->id)
            ->first();

        if(!sizeof($license)) {
            return false;
        }

        if (strtotime($license->expire_date) < time()) {
            return false;
        }

        if ($key !== strtolower(substr(md5(strtoupper($item->secure_key . md5($domain) . $license->verify_code)), 0, 20))) {
            return false;
        }

        return true;
    }
}
