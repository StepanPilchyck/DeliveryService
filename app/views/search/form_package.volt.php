<!DOCTYPE HTML>
<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Searching packages - ICS</title>
        
        <?php foreach ($js as $file) { ?>
        <script type="text/javascript" src="<?php echo $file; ?>"></script>
        <?php } ?>
        
        <?php foreach ($css as $file) { ?>
        <link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" />
        <?php } ?>
        
        
        
    </head>
    <!--body onload="jsAsync.init();"-->
    <body>
        <div class="main">
        <header class="header">
    <div class="container-fluid">
        <div class="row">
            
            <div class="header-btn_logo col-xs-12 col-sm-3 col-md-2">
                <table width="100%">
                    <tr>
                        <td class="logo">
                            <a href="/"><img src="/img/logo.png"></a>
                        </td>
                        <td class="header-btn">
                            <ul class="nav navbar-left">
                                <li class="jsOnClick_menu work-btn <?=($TopMenuSelected == 'work')?'active':''?>"><a href="/work"><span>&nbsp;</span></a></li>
                                <li class="jsOnClick_menu settings-btn <?=($TopMenuSelected == 'settings')?'active':''?>"><a href="/settings"><span>&nbsp;</span></a></li>
                                <li class="jsOnClick_menu messages-btn <?=($TopMenuSelected == 'messages')?'active':''?>"><a href="/messages"><span>&nbsp;</span></a></li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="header-user_name col-xs-1 col-xs-offset-11 col-sm-3 col-sm-offset-6 col-md-2 col-md-offset-8">
                <span class="font_style_4">Добро пожаловать, <?=Users::getUserName()?></span>
            </div>
            
        </div>
    </div>
</header>
        
        

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="content-left_column col-xs-12 col-sm-3 col-md-2">
    <ul class="nav">
        <li><?=ResourceStrings::getStringLang('package')?></li>
        <li class="jsOnClick_submenu <?=($MenuSelected == 'add')?'selected':''?>"><a href="#"><?=ResourceStrings::getStringLang('package_add')?></a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li class="<?=($MenuSelected.$MenuItemActive == 'addfile')?'active':''?>"><a href="/package/add/file">Из файла</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'addregister')?'active':''?>"><a href="/package/add/register">С регистрацией</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'addone')?'active':''?>"><a href="/package/add/one">Единичный</a></li>
            </ul>
        </li>
        <li class="jsOnClick_submenu <?=($MenuSelected == 'to')?'selected':''?>"><a href="#">Выпуск</a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li><a href="/">Отправка по манифесту</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'toextradition')?'active':''?>"><a href="/package/to/extradition">Передача в зону выдачи</a></li>
                <li><a href="/">Выдача получателю</a></li>
                <li><a href="/">Доставка получателю</a></li>
            </ul>
        </li>
        <li class="jsOnClick_submenu"><a href="#">Хранение</a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li><a href="/">Передать на хранение</a></li>
            </ul>
        </li>
    </ul>

    <ul class="nav">
        <li>Статистика и отчёты</li>
        <li class="jsOnClick_submenu"><a href="#">Отчеты МЭО</a><div class="ico">&nbsp;</div></li>
        <li class="jsOnClick_submenu"><a href="#">Статистика</a><div class="ico">&nbsp;</div></li>
    </ul>

    <ul class="nav">
        <li>Администрирование</li>
        <li class="jsOnClick_submenu <?=($MenuSelected == 'role')?'selected':''?>"><a href="#">Роли</a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li class="<?=($MenuSelected.$MenuItemActive == 'roleadd')?'active':''?>"><a href="/administration/role/add">Создать</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'rolepreview')?'active':''?>"><a href="/administration/role/preview">Просмотр</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'roleedit')?'active':''?>"><a href="/administration/role/edit">Редактировать</a></li>
            </ul>
        </li>
        <li class="jsOnClick_submenu <?=($MenuSelected == 'reference')?'selected':''?>"><a href="#">Глобальные настройки</a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li class="<?=($MenuSelected.$MenuItemActive == 'referenceedit')?'active':''?>"><a href="/administration/reference/edit">Редактировать</a></li>
            </ul>
        </li>
        <li class="jsOnClick_submenu <?=($MenuSelected == 'stations')?'selected':''?>"><a href="#">Станции</a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li class="<?=($MenuSelected.$MenuItemActive == 'stationsadd')?'active':''?>"><a href="/administration/station/add">Создать</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'stationspreview')?'active':''?>"><a href="/administration/station/preview">Просмотр</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'stationsedit')?'active':''?>"><a href="/administration/station/edit">Редактировать</a></li>
            </ul>
        </li>
        <li class="jsOnClick_submenu <?=($MenuSelected == 'user')?'selected':''?>"><a href="#">Пользователи</a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li class="<?=($MenuSelected.$MenuItemActive == 'useradd')?'active':''?>"><a href="/administration/user/add">Создать</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'userpreview')?'active':''?>"><a href="/administration/user/preview">Просмотр</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'useredit')?'active':''?>"><a href="/administration/user/edit">Редактировать</a></li>
            </ul>
        </li>
        <li class="jsOnClick_submenu <?=($MenuSelected == 'persons')?'selected':''?>"><a href="#">Адресная книга</a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li class="<?=($MenuSelected.$MenuItemActive == 'personsadd')?'active':''?>"><a href="/administration/person/add">Создать</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'personspreview-cache-station')?'active':''?>"><a href="/administration/person/preview-cache-station">Просмотр (кэш станции)</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'personspreview-cache')?'active':''?>"><a href="/administration/person/preview-cache">Просмотр (часто используемые)</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'personspreview')?'active':''?>"><a href="/administration/person/preview">Просмотр (все)</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'personsedit')?'active':''?>"><a href="/administration/person/edit">Редактировать</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'personssettings')?'active':''?>"><a href="/administration/person/settings">Настройки</a></li>
            </ul>
        </li>
    </ul>

    <ul class="nav">
        <li>Поиск</li>
        <li class="jsOnClick_submenu <?=($MenuItemActive == 'htd')?'active':''?>"><a href="/search/package/htd">Поиск по ДТД</a><div class="ico">&nbsp;</div></li>
        <li class="jsOnClick_submenu <?=($MenuSelected == 'search')?'selected':''?>"><a href="#">Расширенный</a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li class="<?=($MenuSelected.$MenuItemActive == 'searchpackage')?'active':''?>"><a href="/search/full/package">Посылки</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'searchusers')?'active':''?>"><a href="/search/full/users">Пользователи</a></li>
                <li class="<?=($MenuSelected.$MenuItemActive == 'searchstations')?'active':''?>"><a href="/search/full/stations">Станции</a></li>
            </ul>
        </li>
    </ul>
</div>






<div class="content-left_column col-xs-12 col-sm-3 col-md-2" style="display: none;">
    <ul class="nav">
        <li>Настройки</li>
        <li class="jsOnClick_submenu"><a href="#">Личные данные</a><div class="ico">&nbsp;</div></li>
        <li class="jsOnClick_submenu"><a href="#">По умолчанию</a><div class="ico">&nbsp;</div></li>
        <li class="jsOnClick_submenu"><a href="/auth/logout">Выход</a><div class="ico">&nbsp;</div></li>
    </ul>
</div>







<div class="content-left_column col-xs-12 col-sm-3 col-md-2" style="display: none;">
    <ul class="nav">
        <li>Сообщения</li>
        <li class="jsOnClick_submenu"><a href="#">Входящие</a><div class="ico">&nbsp;</div></li>
        <li class="jsOnClick_submenu"><a href="#">Исходящие</a><div class="ico">&nbsp;</div></li>
        <li class="jsOnClick_submenu"><a href="#">Написать</a><div class="ico">&nbsp;</div></li>
    </ul>
</div>
                    
                    

                        <div class="content-right_column col-sm-offset-3 col-md-offset-2">
                        
                        



<div class="page_name">
    <span>Поиск посылок</span>
</div>

<?php foreach ($messages as $item) { ?>
    
    <div class="alert <?php echo $item['class']; ?>">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $item['text']; ?>
    </div>
    
<?php } ?>

<!--textarea style="height: 620px;">
<?php print_r($result_search); ?>
</textarea><!-- -->

<form method="get" enctype="multipart/form-data" action="">
    
<table width="100%" class="table_content">
<tbody>

    <tr>
        <td>

            <div class="panel_1 <?php if (!$post['submit']) { ?> active <?php } ?>">
                
                <div class="panel_header">
                    <div class="panel_name">
                        <span>Параметры поиска</span>
                    </div>
                    <div class="panel_show-hide">&nbsp</div>
                </div><!--.panel_header-->
                
                <div class="panel_content">
                    <div class="block_width_75">
                        <p class="font_style_3">Фильтр по параметрам посылок.</p>
                        <div class="block_width_100">
                            
                            <div class="block_width_100">
                                <p class="font_style_2">Поиск по ДТД:</p>
                                <input type="text" name="package[htd]" placeholder="ДТД" value="<?php if ($post['package']['htd']) { ?><?php echo $post['package']['htd']; ?><?php } ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                            </div>
                            
                            <p class="font_style_2">Дата приёма сотрудником ICS:</p>
                            <div class="block_width_50">
                                <input type="text" name="package[date_on_reception_to]" placeholder="Дата с" value="<?php if ($post['package']['date_on_reception_to']) { ?><?php echo $post['package']['date_on_reception_to']; ?><?php } ?>" class="jsOnKeyup jsOnClick_date showtext animation_off" readonly="true">
                            </div>
                            <div class="block_width_50">
                                <input type="text" name="package[date_on_reception_do]" placeholder="Дата по" value="<?php if ($post['package']['date_on_reception_do']) { ?><?php echo $post['package']['date_on_reception_do']; ?><?php } ?>" class="jsOnKeyup jsOnClick_date showtext animation_off" readonly="true">
                            </div>
                            
                            <p class="font_style_2">Стоимость посылки:</p>
                            <div class="block_width_50">
                                <input type="text" name="package[content_price_to]" placeholder="С" value="<?php if ($post['package']['content_price_to']) { ?><?php echo $post['package']['content_price_to']; ?><?php } ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                            </div>
                            <div class="block_width_50">
                                <input type="text" name="package[content_price_do]" placeholder="По" value="<?php if ($post['package']['content_price_do']) { ?><?php echo $post['package']['content_price_do']; ?><?php } ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                            </div>
                            
                            <div class="block_width_50">
                                <p class="font_style_2">Станция:</p>
                                
                                <div class="input-select">
                                    <input type="hidden" value="<?php if ($post['package']['station_id']) { ?><?php echo $post['package']['station_id']; ?><?php } ?>" name="package[station_id]">
                                    <input type="text" placeholder="Станция" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                    <div class="list-select">
                                        <div class="item" data-id="" data-name="">
                                            <span> &nbsp; </span>
                                        </div>
                                        <?php foreach ($StationsAll as $station) { ?>
                                        <div class="item" data-id="<?php echo $station['id']; ?>" data-name="<?php echo $station['name']; ?>">
                                            <span><?php echo $station['name']; ?></span>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="block_width_50">
                                <p class="font_style_2">Статус:</p>
                                <div class="input-select">
                                    <input type="hidden" value="<?php if ($post['package']['statys_id']) { ?><?php echo $post['package']['statys_id']; ?><?php } ?>" name="package[statys_id]">
                                    <input type="text" placeholder="Статус" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                    <div class="list-select">
                                        <div class="item" data-id="" data-name="">
                                            <span> &nbsp; </span>
                                        </div>
                                        <?php foreach ($PackageStatusAll as $pstatus) { ?>
                                        <div class="item" data-id="<?php echo $pstatus['id']; ?>" data-name="<?php echo $pstatus['name']; ?>">
                                            <span><?php echo $pstatus['name']; ?></span>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <p class="font_style_2">Фильтр по посылкам.</p>
                            
                            <div class="block_width_50">
                                <input type="text" name="package[full_name]" placeholder="ФИО" value="<?php if ($post['package']['full_name']) { ?><?php echo $post['package']['full_name']; ?><?php } ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                            </div>
                            
                            <div class="block_width_50">
                                <input type="text" name="package[phone]" placeholder="Телефон" value="<?php if ($post['package']['phone']) { ?><?php echo $post['package']['phone']; ?><?php } ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                            </div>
                            
                            <div class="block_width_50">
                                
                                <div class="input-select">
                                    <input type="hidden" value="<?php if ($post['package']['country_id']) { ?><?php echo $post['package']['country_id']; ?><?php } ?>" name="package[country_id]">
                                    <input type="text" placeholder="Страна" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                    <div class="list-select">
                                        <div class="item" data-id="" data-name="">
                                            <span> &nbsp; </span>
                                        </div>
                                        <?php foreach ($CountriesAll as $item) { ?>
                                        <div class="item" data-id="<?php echo $item['id']; ?>" data-name="<?php echo $item['name']; ?>">
                                            <span><?php echo $item['name']; ?></span>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="block_width_50">
                                <input type="text" name="package[full_address]" placeholder="Адрес" value="<?php if ($post['package']['full_address']) { ?><?php echo $post['package']['full_address']; ?><?php } ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                            </div>
                            
                            <div class="block_width_100">
                                <p class="font_style_2">Фильтр по типу посылки.</p>
                                <input type="radio" name="package[content_type]" value="NULL" <?php if (!$post['package']['content_type'] || $post['package']['content_type'] == 'NULL') { ?> checked <?php } ?> id="content_type-2">
                                <label for="content_type-2">Все</label>
                                <input type="radio" name="package[content_type]" value="FALSE" <?php if ($post['package']['content_type'] == 'FALSE') { ?> checked <?php } ?> id="content_type-0">
                                <label for="content_type-0">Не документ</label>
                                <input type="radio" name="package[content_type]" value="TRUE" <?php if ($post['package']['content_type'] == 'TRUE') { ?> checked <?php } ?> id="content_type-1">
                                <label for="content_type-1">Документ</label>
                                <div class="float_clear">&nbsp;</div>
                            </div>
                            
                        </div>
                        
                    </div>

                    <div class="block_width_25">
                        
                        <p class="font_style_3">Фильтр по адресной книге.</p>
                        <div class="block_width_100">
                            <p class="font_style_2">Данные отправителя и/или адресата:</p>
                            <input type="text" name="person[code]" placeholder="Код" value="<?php if ($post['person']['code']) { ?><?php echo $post['person']['code']; ?><?php } ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        
                        <div class="block_width_100">
                            <p class="font_style_2">Полные Ф.И.О.:</p>
                            <input type="text" name="person[full_name]" placeholder="ФИО" value="<?php if ($post['person']['full_name']) { ?><?php echo $post['person']['full_name']; ?><?php } ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        
                        <div class="block_width_100">
                            <p class="font_style_2">Номер телефона:</p>
                            <input type="text" name="person[phone]" placeholder="Телефон" value="<?php if ($post['person']['phone']) { ?><?php echo $post['person']['phone']; ?><?php } ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        
                        <div class="block_width_100">
                            <p class="font_style_2">Список стран:</p>
                            <div class="input-select">
                                    <input type="hidden" value="<?php if ($post['person']['country_id']) { ?><?php echo $post['person']['country_id']; ?><?php } ?>" name="person[country_id]">
                                    <input type="text" placeholder="Страна" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                    <div class="list-select">
                                        <div class="item" data-id="" data-name="">
                                            <span> &nbsp; </span>
                                        </div>
                                        <?php foreach ($CountriesAll as $item) { ?>
                                        <div class="item" data-id="<?php echo $item['id']; ?>" data-name="<?php echo $item['name']; ?>">
                                            <span><?php echo $item['name']; ?></span>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                        </div>
                        
                        <div class="block_width_100">
                            <p class="font_style_2">Полный адрес:</p>
                            <input type="text" name="person[full_address]" placeholder="Адрес" value="<?php if ($post['person']['full_address']) { ?><?php echo $post['person']['full_address']; ?><?php } ?>" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        
                        <div class="block_width_100">
                            <p class="font_style_2">Фильтр по типу отправитель и/или адресат.</p>
                            <input type="checkbox" name="person[status1]" value="1" <?php if ($post['person']['status1']) { ?> checked <?php } ?> id="person_status-0">
                            <label for="person_status-0">Отправитель</label>
                            <input type="checkbox" name="person[status2]" value="2" <?php if ($post['person']['status2']) { ?> checked <?php } ?> id="person_status-1">
                            <label for="person_status-1">Адресат</label>
                            <div class="float_clear">&nbsp;</div>
                        </div>
                        
                    </div>
                    
                </div><!--.panel_content-->
                
                <div class="panel_bottom">
                    <input type="submit" name="submit" value="Поиск">
                </div><!--.panel_bottom-->
                
            </div><!--.panel_1-->
            
        </td>
    </tr>
</tbody>
</table>

</form>

<table class="table table-list_grid_1" width="100%">
    <tbody>
        <tr>
            <th align="center"><span>ДТД</span></th>
            <th align="center"><span>Дата</span></th>
            <th align="center"><span>Комментарий</span></th>
            <th align="center"><span>Стр. отправителя</span></th>
            <th align="center"><span>ФИО отправителя</span></th>
            <th align="center"><span>Стр. получателя</span></th>
            <th align="center"><span>ФИО получателя</span></th>
            <th align="center"><span>К-во мест</span></th>
            <th align="center"><span>Общий вес</span></th>
            <th align="center"><span>Стоимость</span></th>
            <th align="center"><span>Валюта</span></th>
            <th align="center"><span>Состояние</span></th>
            <th align="center"><span>Станция</span></th>
            <th align="center"><span>Подробнее</span></th>
        </tr>

<?php foreach ($result_search as $item) { ?>

        <tr>
            <td align="center"><span><?php echo $item['htd']; ?></span></td>
            <td align="center"><span><?php echo $item['date_on_add']; ?></span></td>
            <td align="center"><span><?php echo $item['comment']; ?></span></td>
            <td align="center"><span><?php echo $item['sender_county_name']; ?></span></td>
            <td align="center"><span><?php echo $item['sender_full_name']; ?></span></td>
            <td align="center"><span><?php echo $item['recipient_county_name']; ?></span></td>
            <td align="center"><span><?php echo $item['recipient_full_name']; ?></span></td>
            <td align="center"><span><?php echo $item['place_count']; ?></span></td>
            <td align="center"><span><?php echo $item['full_weight']; ?></span></td>
            <td align="center"><span><?php echo $item['content_price']; ?></span></td>
            <td align="center"><span><?php echo $item['short_name']; ?></span></td>
            <td align="center"><span><?php echo $item['status_name']; ?></span></td>
            <td align="center"><span><?php echo $item['station_name']; ?></span></td>
            <td align="center"><span>&nbsp;</span></td>
        </tr>
    
<?php } ?> 
    
    </tbody>
</table>


                        </div>
                    </div>
                </div>
            </div><!--.content-->
        </div><!--.main-->
    </body>
</html>