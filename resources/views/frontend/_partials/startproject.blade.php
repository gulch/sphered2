<div class="main_box">
    <div class="main_box start_project rounded_bg_up">
        <div class="mask top_mask"></div>
        <div class="container">
            <div class="row">
                <h5 id="start" class="heading font54 tc1 bold span6 offset3">ДОБАВИТЬ СВОЮ РАБОТУ</h5>
            </div>
            <div class="roket"></div>
        </div>
        <div class="rule_pat"></div>
    </div>
    <div class="form_box container">
        <div class="row-fluid margin-top36">
            <h6 class="tc8">Пожалуйста, заполните небольшой бриф.</h6>
        </div>
        <div class="form new_project">
            <form id="new_project" action="/message/start" method="post">
                <div class="row-fluid">
                    <div class="element span6">
                        <input class="span12" name="name" required type="text" placeholder="Имя*" />
                    </div>
                    <div class="element span6">
                        <input class="span12" name="email" required type="text" placeholder="E-mail*" />
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="element span6">
                        <input class="span12" name="phone" type="text" placeholder="Телефон" />
                    </div>
                    <div class="element span6">
                        <input class="span12" name="website" type="text" placeholder="Веб-сайт" />
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="element span6">
                        <select class="span12" name="project_type">
                            <option>Тип работы</option>
                            <option value="Виртуальный тур">Виртуальный тур</option>
                            <option value="3D панорама">3D панорама</option>
                            <option value="3D обьект">3D обьект</option>
                            <option value="Другое">Другое</option>
                        </select>
                    </div>
                    <div class="element span6">
                        <select class="span12" name="business">
                            <option>Кто вы?</option>
                            <option value="Фотограф">Фотограф</option>
                            <option value="Студия">Студия</option>
                            <option value="Агенство">Агенство</option>
                            <option value="Другое">Другое</option>
                        </select>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="element span9">
                        <textarea name="description" class="span12" placeholder="Опишите вашу работу, и пожелания"></textarea>
                    </div>
                    <div class="element span3">
                        <input class="tc1 bold bg6" type="submit" value="ОТПРАВИТЬ" />
                    </div>
                    <span class="font14">* поля обязательные для заполнения</span>
                </div>
                <div class="alert a_headsup hide">
                    <div class="left rmargin15">
                        <i class="fa fa-exclamation-triangle fa-3x"></i>
                    </div>
                    <a class="close fa" data-dismiss="alert" href="javascript:void(0)">×</a>
                    <span class="msg tc2"></span>
                </div>
                {{ csrf_token() }}
                <input type="hidden" value="rus" name="lang"/>
            </form>
        </div>
    </div>
</div>