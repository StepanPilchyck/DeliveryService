<!DOCTYPE HTML>
<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Preview persons - ICS</title>
        
        <?php foreach ($js as $file) { ?>
        <script type="text/javascript" src="<?php echo $file; ?>"></script>
        <?php } ?>
        
        <?php foreach ($css as $file) { ?>
        <link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" />
        <?php } ?>
        
        

    </head>
    <body onload="jsAsync.init();">
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
        <li class="jsOnClick_submenu"><a href="#">Выпуск</a><div class="ico">&nbsp;</div>
            <ul class="nav">
                <li><a href="/">Отправка по манифесту</a></li>
                <li><a href="/">Передача в зону выдачи</a></li>
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
    <span>Список адресной книги (все записи)</span>
</div>

<?php foreach ($messages as $item) { ?>
    <div class="alert fade in <?php echo $item['class']; ?>">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $item['text']; ?>
    </div>
<?php } ?>

<table class="table table-list_grid_1" width="100%">
    <tbody>
        <tr>
            <th align="left"><span>Код</span></th>
            <th align="left"><span>ФИО</span></th>
            <th align="left"><span>Адрес</span></th>
            <th align="left"><span>Страна</span></th>
            <th align="left"><span>Телефон</span></th>
            <th align="left"><span>Дата создания</span></th>
            <th align="center"><span>К-во обращений</span></th>
            <th align="center" width="130px"><span>&nbsp;</span></th>
            <th align="center" width="1px"><span>&nbsp;</span></th>
        </tr>
        <?php foreach ($PersonsCacheAll as $item) { ?>
        <tr>
            <td align="left">
                <span><?php echo $item['person_code']; ?></span>
            </td>
            <td align="left">
                <span><?php echo $item['person_full_name']; ?> <?php if ($item['first_name']) { ?><?php echo $item['first_name']; ?> <?php } ?>  <?php if ($item['middle_name']) { ?><?php echo $item['middle_name']; ?> <?php } ?></span>
            </td>
            <td align="left">
                <span><?php echo $item['person_full_address']; ?></span>
            </td>
            <td align="left">
                <span><?php echo $item['person_country_name']; ?></span>
            </td>
            <td align="left">
                <span><?php echo $item['person_phone']; ?></span>
            </td>
            <td align="left">
                <span><?php echo $item['date_on_add']; ?></span>
            </td>
            <td align="center">
                <span><?php echo $item['weight']; ?></span>
            </td>
            <td align="center">
                <span>
                    <a href="/<?php echo $item['id']; ?>" onClick="jsAsync.ShowModal(event, '<p>Подтвердите удаление</p>', '<p>Вы действительно хотите удалить запись <?php echo $item['person_full_name']; ?> <?php echo $item['person_full_address']; ?> ?</p>', 'Да', 'Нет', 'delete', '', '<?php echo $item['id']; ?>');">
                        Удалить
                    </a>(
                    <a href="#" title="Колличество связей с Кешом станций"><?php echo $item['from_persons_cache']; ?></a>
                )</span>
            </td>
            <td align="center">
                <span>
                    <a href="/administration/person/edit/<?php echo $item['id']; ?>">
                        <div class="panel_edit relative">
                            &nbsp;
                        </div>
                    </a>
                </span>
            </td>
            <?php } ?>
        </tr>
    </tbody>
</table>


                        </div>
                    </div>
                </div>
            </div><!--.content-->
        </div><!--.main-->
    </body>
</html>