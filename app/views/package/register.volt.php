<!DOCTYPE HTML>
<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Add package registry - ICS</title>
        
        <?php foreach ($js as $file) { ?>
        <script type="text/javascript" src="<?php echo $file; ?>"></script>
        <?php } ?>
        
        <?php foreach ($css as $file) { ?>
        <link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" />
        <?php } ?>
        
        

<script type="text/javascript">
ObjPackageAddRegistry.prototype.dataItems_sender_p1 = 
{
    lang_panel_name: 'Отправитель',
    lang_panel_count: 1,
    lang_code: 'Код',
    lang_flm: 'ФИО',
    lang_phone: 'Телефон',
    lang_country: 'Страна',
    lang_addr: 'Адрес',
    lang_save: 'Сохранить'
};

ObjPackageAddRegistry.prototype.dataItems_recipient_p1 = 
{
    lang_panel_name: 'Адресат',
    lang_panel_count: 1,
    lang_code: 'Код',
    lang_flm: 'ФИО',
    lang_phone: 'Телефон',
    lang_country: 'Страна',
    lang_addr: 'Адрес',
    lang_save: 'Сохранить'
};

ObjPackageAddRegistry.prototype.dataItems_panel2 = 
{
    number: '№',
    description: 'Описание',
    count: 'К-во',
    units: 'Ед. изм.',
    price: 'Цена'
};
</script>


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
    <span>Прием с регистрацией</span>
</div>

<form method="post" enctype="multipart/form-data" class="jsOnSubmit_validation">
<table width="100%" class="table_content package_add-registration">
    <tbody>
        
    <tr>
        <td class="caption">
            <p>Основное</p>
        </td>
        <td>
            <div class="block_width_50">
                <input type="text" name="package_htd" placeholder="ДТД" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup" disabled data-validation="8 int">
            </div>
            <div class="block_width_50">
                <input type="checkbox" name="package_htd_auto" checked id="package_htd_auto" class="trigger">
                <label for="package_htd_auto">Автогенерация</label>
            </div>
        </td>
    </tr>
    
    
    <tr class="hr">
        <td colspan="2" align="center">
            <center>
            <hr>
            </center>
        </td>
    </tr>

    
    <tr>
        <td class="caption">
            <p>Откуда</p>
        </td>
        <td>
            
<script id="tmpl_send_p1" type="text/x-jquery-tmpl">
    <div class="panel_1 active">
                
        <div class="panel_header">
            <div class="panel_name">
                <span>${lang_panel_name} - <span class="p_count">${lang_panel_count}</span></span>
                <span class="details">
                    <b>:</b> 
                    <span class="code"></span> 
                    <span class="name"></span>, 
                    <span class="country"></span>, 
                    <span class="addr"></span> 
                </span>
            </div>
            <div class="panel_show-hide">
                &nbsp;
            </div>
            <div class="panel_close">
                &nbsp;
            </div>
        </div>

        <div class="panel_content">
            <div class="block_width_50">
                <input type="text" name="person_send_code[]" placeholder="${lang_code}" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup code" data-validation="255 int-chrEN">
                <input type="button" name="" value="" class="isOnClick_ajax btn-search" data-url="/ajax/person/search">
            </div>
            <div class="block_width_50">
                <input type="text" name="package_send_name[]" placeholder="${lang_flm}" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup name" data-validation="255 all">
            </div>
            <div class="block_width_50">
                <input type="text" name="package_send_phone[]" placeholder="${lang_phone}" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup" data-validation="255 phone">
            </div>
            <div class="block_width_50">
                <div class="input-select">
                    <input name="package_send_country[]" value="" type="hidden">
                    <input type="text" placeholder="${lang_country}" value="" class="jsOnChange_input country" readonly="readonly" autocomplete="off" data-validation="255 all">
                    <div class="list-select">
                        <?php foreach ($countries as $item) { ?>
                        <div class="item" data-id="<?php echo $item['id']; ?>" data-name="<?php echo $item['name']; ?>">
                            <span><?php echo $item['name']; ?></span>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="block_width_100">
                <input type="text" name="package_send_addr[]" placeholder="${lang_addr}" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup addr" data-validation="255 all">
            </div>
        </div><!--.panel_content-->

        <div class="panel_bottom">
            <div class="panel_buttuns">
                <input type="button" value="${lang_save}" class="person_save">
            </div>
        </div>

    </div>
</script>
            <div data-init="tmpl_send_p1"></div>
            
            <div class="panel_1_send_create">
                <input name="panel_1_create" type="button" value="">
            </div>
        </td>
    </tr>
    
    
    <tr class="hr">
        <td colspan="2" align="center">
            <center>
            <hr>
            </center>
        </td>
    </tr>
    
    
    <tr>
        <td class="caption">
            <p>Куда</p>
        </td>
        <td>
            
<script id="tmpl_rec_p1" type="text/x-jquery-tmpl">
    <div class="panel_1 active">
                
        <div class="panel_header">
            <div class="panel_name">
                <span>${lang_panel_name} - <span class="p_count">${lang_panel_count}</span></span>
                <span class="details">
                    <b>:</b> 
                    <span class="code"></span>
                    <span class="name"></span>, 
                    <span class="country"></span>,
                    <span class="addr"></span> 
                </span>
            </div>
            <div class="panel_show-hide">
                &nbsp;
            </div>
            <div class="panel_close">
                &nbsp;
            </div>
        </div>

        <div class="panel_content">
            <div class="block_width_50">
                <input type="text" name="person_rec_code[]" placeholder="${lang_code}" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup code" data-validation="255 int-chrEN">
                <input type="button" name="" value="" class="isOnClick_ajax btn-search" data-url="/ajax/person/search">
            </div>
            <div class="block_width_50">
                <input type="text" name="package_rec_name[]" placeholder="${lang_flm}" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup name" data-validation="255 all">
            </div>
            <div class="block_width_50">
                <input type="text" name="package_rec_phone[]" placeholder="${lang_phone}" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup" data-validation="255 phone">
            </div>
            <div class="block_width_50">
                <div class="input-select">
                    <input name="package_rec_country[]" value="" type="hidden">
                    <input type="text" placeholder="${lang_country}" value="" class="jsOnChange_input country" readonly="readonly" autocomplete="off" data-validation="255 all">
                    <div class="list-select">
                        <?php foreach ($countries as $item) { ?>
                        <div class="item" data-id="<?php echo $item['id']; ?>" data-name="<?php echo $item['name']; ?>">
                            <span><?php echo $item['name']; ?></span>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="block_width_100">
                <input type="text" name="package_rec_addr[]" placeholder="${lang_addr}" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup addr" data-validation="255 all">
            </div>
        </div><!--.panel_content-->

        <div class="panel_bottom">
            <div class="panel_buttuns">
                <input type="button" value="${lang_save}" class="person_save">
            </div>
        </div>

    </div>
</script>
            <div data-init="tmpl_rec_p1"></div>
            
            <div class="panel_1_rec_create">
                <input name="panel_1_create" type="button" value="">
            </div>

        </td>
    </tr>
    
    
    <tr class="hr">
        <td colspan="2" align="center">
            <center>
            <hr>
            </center>
        </td>
    </tr>
    
    
    <tr>
        <td class="caption">
            <p>Содержимое</p>
        </td>
        <td>
            <div class="block_width_100">
                <p>Вы можете заполнить форму или <a href="#">загрузить файл</a> (<a href="#">шаблон</a>).</p>
                
                <div class="document_not_document" data-init="tmpl_not_document">
                
                    <div class="selected_document_not_document block_width_50 not_float">
                            
                        <input type="radio" name="cont_type" value="0" checked id="cont_type-0">
                        <label for="cont_type-0">Не документ</label>

                        <input type="radio" name="cont_type" value="1" id="cont_type-1">
                        <label for="cont_type-1">Документ</label>
                        <br>
                            
                    </div>
                    
                    <div class="clear_float">&nbsp;</div>
                    
                    <div class="change_document_not_document">
                        <div class="block_width_50">
                            <div class="block_width_100">
                                <p class="height_10px">&nbsp;</p>
                            </div>
                            <div class="block_width_100">
                                <input type="text" name="pack_cont_descr_nd" placeholder="Описание" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup" data-validation="255 all">
                            </div>
                            <div class="block_width_50">
                                <input type="text" name="pack_cont_pl_count_nd" placeholder="К-во мест" value="1" class="jsOnFocusin jsOnFocusout jsOnKeyup" readonly="true">
                            </div>
                            <div class="block_width_50">
                                <input type="text" name="pack_cont_weight_nd" placeholder="Общий вес" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup" data-validation="24 real">
                            </div>
                            <div class="block_width_50">
                                <input type="text" name="pack_cont_price_nd" placeholder="Стоимость" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup" data-validation="12 int">
                            </div>

                            <div class="block_width_50">
                                <div class="input-select">
                                    <input type="hidden" value="" name="pack_cont_curr_nd">
                                    <input type="text" placeholder="Валюта" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off" data-validation="255 all">
                                    <div class="list-select">
                                        <?php foreach ($currency as $item) { ?>
                                        <div class="item" data-id="<?php echo $item['id']; ?>" data-name="<?php echo $item['short_name']; ?>">
                                            <span><?php echo $item['short_name']; ?></span>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="block_width_100">
                                <textarea name="pack_cont_comm_nd" placeholder="Комментарий" class="jsOnKeyup"></textarea>
                            </div>
                        </div>

                        <div class="block_width_50">

                            <div class="panel2_caption">
                                <div class="panel2_table">
                                    <div class="pt_row">
                                        <div class="pt_col_36px">
                                            <span>№</span>
                                        </div>
                                        <div class="pt_col_auto">
                                            <div class="panel2_table">
                                                <div class="pt_row">
                                                    <div class="pt_col_33">
                                                        <span>Длина</span>
                                                    </div>
                                                    <div class="pt_col_33">
                                                        <span>Ширина</span>
                                                    </div>
                                                    <div class="pt_col_auto">
                                                        <span>Высота</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt_col_40px">
                                            <select name="pack_cont_pl_units" class="units">
                                                <!--option value="-1"> </option-->
                                                <?php foreach ($units_1 as $item) { ?>
                                                <option value="<?php echo $item['id']; ?>">(<?php echo $item['short_name']; ?>)</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div><!--.panel2_caption-->
                            
<script id="tmpl_panel_2" type="text/x-jquery-tmpl">
    <div class="panel_2 active">
                        
        <div class="panel_header">
            <div class="panel2_table">
                <div class="pt_row">
                    <div class="pt_col_36px">
                        <input type="text" value="" disabled class="disabled p_count p2">
                    </div>
                    <div class="pt_col_auto">
                        <div class="panel2_table">
                            <div class="pt_row">
                                <div class="pt_col_33">
                                    <input type="text" name="" data-group="pack_cont_pl" data-name="[length]" value="" data-validation="12 real">
                                </div>
                                <div class="pt_col_33">
                                    <input type="text" name="" data-group="pack_cont_pl" data-name="[width]" value="" data-validation="12 real">
                                </div>
                                <div class="pt_col_auto">
                                    <input type="text" name="" data-group="pack_cont_pl" data-name="[height]" value="" data-validation="12 real">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt_col_40px">
                        <div class="panel_show-hide p2">
                            &nbsp;
                        </div>
                        <div class="panel_close p2">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div><!--.panel_header-->

        <div class="panel_content">

            <div class="panel3_caption">
                <div class="panel3_table">
                    <div class="pt_row">
                        <div class="pt_col_30px">
                            <span>${number}</span>
                        </div>
                        <div class="pt_col_auto">
                            <div class="panel3_table">
                                <div class="pt_row">
                                    <div class="pt_col_25">
                                        <span>${description}</span>
                                    </div>
                                    <div class="pt_col_25">
                                        <span>${count}</span>
                                    </div>
                                    <div class="pt_col_25">
                                        <span>${units}</span>
                                    </div>
                                    <div class="pt_col_25">
                                        <span>${price}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt_col_24px">
                            <span>&nbsp;</span>
                        </div>
                    </div>
                </div>
            </div><!--.panel3_caption-->
    
            <div data-init="tmpl_panel_3"></div>

            <div class="panel_3_create">
                <input name="panel_3_create" type="button" value="">
            </div>

        </div><!--.panel_content-->

        <div class="panel_bottom">
        </div><!--.panel_bottom-->

    </div><!--.panel_2-->
</script>

<script id="tmpl_panel_3" type="text/x-jquery-tmpl">
    
    <div class="panel_3 active">
                                
        <div class="panel_header">
            <div class="panel3_table">
                <div class="pt_row">
                    <div class="pt_col_30px">
                        <input type="text" value="" disabled class="disabled p_count p3">
                    </div>
                    <div class="pt_col_auto">
                        <div class="panel3_table">
                            <div class="pt_row">
                                <div class="pt_col_25">
                                    <input type="text" name="" data-group="pack_cont_pl" data-subgroup="[att]" data-name="[descr]" value="" data-validation="255 all">
                                </div>
                                <div class="pt_col_25">
                                    <input type="text" name="" data-group="pack_cont_pl" data-subgroup="[att]" data-name="[u_count]" value="" data-validation="12 int">
                                </div>
                                <div class="pt_col_25">
                                    <select class="units" name="" data-group="pack_cont_pl" data-subgroup="[att]" data-name="[units]">
                                        <?php foreach ($units_34 as $item) { ?>
                                        <option value="<?php echo $item['id']; ?>"><?php echo $item['short_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="pt_col_25">
                                    <input type="text" name="" data-group="pack_cont_pl" data-subgroup="[att]" data-name="[price]" value="" data-validation="24 real">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt_col_24px">
                        <div class="panel_close p3">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div><!--.panel_header-->

    </div><!--panel_3-->
    
</script>
                            <div data-init="tmpl_panel_2"></div>

                            <div class="panel_2_create">
                                <input name="panel_2_create" type="button" value="">
                            </div>

                        </div>
                    </div><!--.change_document_not_document-->
                    
                    <div class="change_document_not_document">
                        <div class="block_width_100">
                            <div class="block_width_100">
                                <p class="height_10px">&nbsp;</p>
                            </div>
                            <div class="block_width_100">
                                <input type="text" name="pack_cont_descr_d" placeholder="Описание" value="Документы" class="jsOnFocusin jsOnFocusout jsOnKeyup" data-validation="255 all">
                            </div>
                            <div class="block_width_50">
                                <input type="text" name="pack_cont_pl_count_d" placeholder="К-во мест" value="1" class="jsOnFocusin jsOnFocusout jsOnKeyup" readonly="true">
                            </div>
                            <div class="block_width_50">
                                <input type="text" name="pack_cont_weight_d" placeholder="Общий вес" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup" data-validation="24 real">
                            </div>
                            <div class="block_width_100">
                                <textarea name="pack_cont_comm_d" placeholder="Комментарий" class="jsOnKeyup"></textarea>
                            </div>
                        </div>
                    </div><!--.change_document_not_document-->
                
                </div><!--.flip_document_not_document-->
                
            </div>
        </td>
    </tr>
    
    
    <tr class="hr">
        <td colspan="2" align="center">
            <center>
            <hr>
            </center>
        </td>
    </tr>
    
    
    <tr>
        <td class="caption">
            <p>Доставка через</p>
        </td>
        <td>
            <div class="block_width_100">
                <input type="text" name="package_guar" placeholder="Доставка" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup" data-validation="255">
            </div>
        </td>
    </tr>
    
    
    <tr class="hr">
        <td colspan="2" align="center">
            <center>
            <hr>
            </center>
        </td>
    </tr>
    
    
    <tr>
        <td class="caption">
            <p>Дата приёма</p>
        </td>
        <td>
            <div class="block_width_100">
                <p class="font_style_1">Дата приёма сотрудником ICS:</p>
                <input type="text" name="date_on_reception" placeholder="Дата" value="<?php echo $date_on_reception_default; ?>" class="jsOnKeyup jsOnClick_datetime animation_off" readonly="true">
            </div>
        </td>
    </tr>
    
    
    <tr class="hr">
        <td colspan="2" align="center">
            <center>
            <hr>
            </center>
        </td>
    </tr>
    
    
    <tr>
        <td class="caption">
            <p>&nbsp;</p>
        </td>
        <td>
            <div class="block_width_100">
                <input type="submit" name="package_submit" value="Принять">
            </div>
        </td>
    </tr>



</tbody>
</table>
</form>



                        </div>
                    </div>
                </div>
            </div><!--.content-->
        </div><!--.main-->
    </body>
</html>