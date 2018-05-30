<?php
/**
 * Created by PhpStorm.
 * User: kazutaka
 * Date: 2018/05/27
 * Time: 20:27
 */
/**
 * @var \App\View\AppView $this
 */

?>

<?php $this->start('topBar') ?>
<ul class="nav navbar-nav navbar-right">
    <!-- Call Search -->
    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
    <!-- #END# Call Search -->

    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
</ul>
<?php $this->end() ?>


<?php $this->start('leftSideBar') ?>

<!-- Menu -->
<div class="menu" style="overflow-y:hidden;">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li>
            <?=
            $this->Html->link('<i class="fa fa-server"></i><span>Servers</span>', [
                'action' => 'servers'
            ], ['escape' => false])
            ?>
        </li>
        <li>
            <?=
            $this->Html->link('<i class="fa fa-hdd"></i><span>Storages</span>', [
                'action' => 'servers'
            ], ['escape' => false])
            ?>
        </li>
        <li>
            <a href="../node_modules/adminbsb-materialdesign/index.html">
                <i class="material-icons">home</i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="../node_modules/adminbsb-materialdesign/pages/typography.html">
                <i class="material-icons">text_fields</i>
                <span>Typography</span>
            </a>
        </li>
        <li>
            <a href="../node_modules/adminbsb-materialdesign/pages/helper-classes.html">
                <i class="material-icons">layers</i>
                <span>Helper Classes</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">widgets</i>
                <span>Widgets</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <span>Cards</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="../node_modules/adminbsb-materialdesign/pages/widgets/cards/basic.html">Basic</a>
                        </li>
                        <li>
                            <a href="../node_modules/adminbsb-materialdesign/pages/widgets/cards/colored.html">Colored</a>
                        </li>
                        <li>
                            <a href="../node_modules/adminbsb-materialdesign/pages/widgets/cards/no-header.html">No Header</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <span>Infobox</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="../node_modules/adminbsb-materialdesign/pages/widgets/infobox/infobox-1.html">Infobox-1</a>
                        </li>
                        <li>
                            <a href="../node_modules/adminbsb-materialdesign/pages/widgets/infobox/infobox-2.html">Infobox-2</a>
                        </li>
                        <li>
                            <a href="../node_modules/adminbsb-materialdesign/pages/widgets/infobox/infobox-3.html">Infobox-3</a>
                        </li>
                        <li>
                            <a href="../node_modules/adminbsb-materialdesign/pages/widgets/infobox/infobox-4.html">Infobox-4</a>
                        </li>
                        <li>
                            <a href="../node_modules/adminbsb-materialdesign/pages/widgets/infobox/infobox-5.html">Infobox-5</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">swap_calls</i>
                <span>User Interface (UI)</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/alerts.html">Alerts</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/animations.html">Animations</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/badges.html">Badges</a>
                </li>

                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/breadcrumbs.html">Breadcrumbs</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/buttons.html">Buttons</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/collapse.html">Collapse</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/colors.html">Colors</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/dialogs.html">Dialogs</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/icons.html">Icons</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/labels.html">Labels</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/list-group.html">List Group</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/media-object.html">Media Object</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/modals.html">Modals</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/notifications.html">Notifications</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/pagination.html">Pagination</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/preloaders.html">Preloaders</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/progressbars.html">Progress Bars</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/range-sliders.html">Range Sliders</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/sortable-nestable.html">Sortable & Nestable</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/tabs.html">Tabs</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/thumbnails.html">Thumbnails</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/tooltips-popovers.html">Tooltips & Popovers</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/ui/waves.html">Waves</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">assignment</i>
                <span>Forms</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/forms/basic-form-elements.html">Basic Form Elements</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/forms/advanced-form-elements.html">Advanced Form Elements</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/forms/form-examples.html">Form Examples</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/forms/form-validation.html">Form Validation</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/forms/form-wizard.html">Form Wizard</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/forms/editors.html">Editors</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">view_list</i>
                <span>Tables</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/tables/normal-tables.html">Normal Tables</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/tables/jquery-datatable.html">Jquery Datatables</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/tables/editable-table.html">Editable Tables</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">perm_media</i>
                <span>Medias</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/medias/image-gallery.html">Image Gallery</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/medias/carousel.html">Carousel</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">pie_chart</i>
                <span>Charts</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/charts/morris.html">Morris</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/charts/flot.html">Flot</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/charts/chartjs.html">ChartJS</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/charts/sparkline.html">Sparkline</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/charts/jquery-knob.html">Jquery Knob</a>
                </li>
            </ul>
        </li>
        <li class="active">
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">content_copy</i>
                <span>Example Pages</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/examples/sign-in.html">Sign In</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/examples/sign-up.html">Sign Up</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/examples/forgot-password.html">Forgot Password</a>
                </li>
                <li class="active">
                    <a href="../node_modules/adminbsb-materialdesign/pages/examples/blank.html">Blank Page</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/examples/404.html">404 - Not Found</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/examples/500.html">500 - Server Error</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">map</i>
                <span>Maps</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/maps/google.html">Google Map</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/maps/yandex.html">YandexMap</a>
                </li>
                <li>
                    <a href="../node_modules/adminbsb-materialdesign/pages/maps/jvectormap.html">jVectorMap</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">trending_down</i>
                <span>Multi Level Menu</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="javascript:void(0);">
                        <span>Menu Item</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span>Menu Item - 2</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <span>Level - 2</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);">
                                <span>Menu Item</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Level - 3</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <span>Level - 4</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="../changelogs.html">
                <i class="material-icons">update</i>
                <span>Changelogs</span>
            </a>
        </li>
        <li class="header">LABELS</li>
        <li>
            <a href="javascript:void(0);">
                <i class="material-icons col-red">donut_large</i>
                <span>Important</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);">
                <i class="material-icons col-amber">donut_large</i>
                <span>Warning</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);">
                <i class="material-icons col-light-blue">donut_large</i>
                <span>Information</span>
            </a>
        </li>
    </ul>
</div>
<!-- #Menu -->
<?php $this->end(); ?>




<?php $this->start('rightSideBar') ?>

<ul class="nav nav-tabs tab-nav-right" role="tablist">
    <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
    <!--    <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>-->
</ul>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
        <ul class="demo-choose-skin">
            <li data-theme="red" class="active">
                <div class="red"></div>
                <span>Red</span>
            </li>
            <li data-theme="pink">
                <div class="pink"></div>
                <span>Pink</span>
            </li>
            <li data-theme="purple">
                <div class="purple"></div>
                <span>Purple</span>
            </li>
            <li data-theme="deep-purple">
                <div class="deep-purple"></div>
                <span>Deep Purple</span>
            </li>
            <li data-theme="indigo">
                <div class="indigo"></div>
                <span>Indigo</span>
            </li>
            <li data-theme="blue">
                <div class="blue"></div>
                <span>Blue</span>
            </li>
            <li data-theme="light-blue">
                <div class="light-blue"></div>
                <span>Light Blue</span>
            </li>
            <li data-theme="cyan">
                <div class="cyan"></div>
                <span>Cyan</span>
            </li>
            <li data-theme="teal">
                <div class="teal"></div>
                <span>Teal</span>
            </li>
            <li data-theme="green">
                <div class="green"></div>
                <span>Green</span>
            </li>
            <li data-theme="light-green">
                <div class="light-green"></div>
                <span>Light Green</span>
            </li>
            <li data-theme="lime">
                <div class="lime"></div>
                <span>Lime</span>
            </li>
            <li data-theme="yellow">
                <div class="yellow"></div>
                <span>Yellow</span>
            </li>
            <li data-theme="amber">
                <div class="amber"></div>
                <span>Amber</span>
            </li>
            <li data-theme="orange">
                <div class="orange"></div>
                <span>Orange</span>
            </li>
            <li data-theme="deep-orange">
                <div class="deep-orange"></div>
                <span>Deep Orange</span>
            </li>
            <li data-theme="brown">
                <div class="brown"></div>
                <span>Brown</span>
            </li>
            <li data-theme="grey">
                <div class="grey"></div>
                <span>Grey</span>
            </li>
            <li data-theme="blue-grey">
                <div class="blue-grey"></div>
                <span>Blue Grey</span>
            </li>
            <li data-theme="black">
                <div class="black"></div>
                <span>Black</span>
            </li>
        </ul>
    </div>
</div>

<?php $this->end(); ?>
