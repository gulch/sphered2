<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PlayController extends Controller
{
    public function play($slug, $key)
    {
        if ($this->checkForLicense($this->getGalleryItemIdBySlug($slug), $key, $this->getRefererDomain())) {
            return View::make('common.play', $this->getGalleryItemData($this->getGalleryItemIdBySlug($slug)));
        } else {
            return View::make('common.expiredplay', array(
                'ref_domain' => $this->getRefererDomain(),
                'item_url' => $this->getGalleryItemURL($this->getGalleryItemIdBySlug($slug))
            ));
        }
    }

    private function getGalleryItemData($id)
    {
        $item = Gallery::with('itemUKR', 'itemCategoryUKR')->find($id);
        return array('item' => $item);
    }

    private function getGalleryItemURL($id)
    {
        $item = Gallery::with('itemType', 'itemCategory')->find($id);
        $preslug = $item->is_commercial ? 'portfolio' : 'gallery';
        return URL::to($preslug . '/' . $item->itemType->url_segment . '/' . $item->itemCategory->url_segment . '/' . $item->url_segment);
    }

    private function getGalleryItemIdBySlug($slug)
    {
        return Gallery::where('url_segment', '=', $slug)->firstOrFail()->id;
    }

    private function getRefererDomain()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            return parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
        }
        return '';
    }

    public function createLicenseKey($domain, $gallery_item_id)
    {
        if ($domain == 'null') {
            $domain = '';
        }
        $item = Gallery::find($gallery_item_id);
        if ($item) {
            $verify_code = strtoupper(substr(md5($item->secure_code . time() . rand(10000000, 9999999999)), 0, 8));
            $license = strtolower(substr(md5(strtoupper($item->secure_key . md5($domain) . $verify_code)), 0, 20));
            dd($gallery_item_id, $domain, $verify_code, $license);
        } else {
            echo 'Item ID Not Found!';
        }
    }

    private function checkForLicense($gallery_item_id, $key, $domain)
    {
        $item = License::with('galleryItem')->whereRaw(' gallery_item_id = ? AND domain = ? ',
            array($gallery_item_id, $domain))->first();

        if (sizeof($item)) {
            if (strtotime($item->expire_date) < time()) {
                return false;
            }
            if ($key == strtolower(substr(md5(strtoupper($item->galleryItem->secure_key . md5($domain) . $item->verify_code)),
                    0, 20))
            ) {
                return true;
            }
        }

        return false;
    }

    /*public function licensePack($domain, $date, $fill = null)
    {
        $items = Gallery::whereRaw(' secure_key <> "" ')->get();
        if($items)
        {
            foreach($items as $item)
            {
                $verify_code = strtoupper(substr(md5($item->secure_code.time().rand(10000000,9999999999)),0,8));

                $license = strtolower(substr(md5(strtoupper($item->secure_key.md5($domain).$verify_code)),0,20));

                $licenseArr = array();
                $licenseArr['gallery_item_id'] = $item->id;
                $licenseArr['license_code'] = $license;
                $licenseArr['domain'] = $domain;
                $licenseArr['verify_code'] = $verify_code;
                $licenseArr['expire_date'] = $date;
                License::create($licenseArr);

                if($fill)
                {
                    $item->link = URL::to('/').'/play/'.$item->url_segment.'/'.$license;
                    $item->save();
                }

                print_r($licenseArr);
            }
        }
    }*/


}
