<?php declare(strict_types=1);

use Mailery\Setting\Model\Setting;
use Mailery\Setting\Model\SettingGroup;
use Mailery\Web\Vue\Directive;

/** @var Yiisoft\Yii\WebView $this */
/** @var Yiisoft\Aliases\Aliases $aliases */
/** @var Yiisoft\Router\UrlGeneratorInterface $url */
/** @var Mailery\Setting\Model\SettingGroupList $groupList */
/** @var Yiisoft\Yii\View\Csrf $csrf */

$this->setTitle('System settings');

?><div class="row">
    <div class="col-12">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        <h4 class="mb-0">System settings</h4>
                    </div>
                    <div class="col-auto">
                        <div class="btn-toolbar float-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mb-2"></div>
<div class="row">
    <div class="col-12">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <b-list-group v-b-scrollspy="{element: '#setting-group-list', offset: 50}" style="position: sticky;top: 80px;">
                            <?php foreach ($groupList as $index => $group) {
                                /** @var SettingGroup $group */
                                ?><b-list-group-item href="#setting-group-item-<?= $index ?>"><?= Directive::pre($group->getLabel()) ?></b-list-group-item>
                            <?php } ?>
                        </b-list-group>
                    </div>

                    <div class="col-9">
                        <div id="setting-group-list">
                            <?php foreach ($groupList as $index => $group) {
                                /** @var SettingGroup $group */
                                ?><h4 id="setting-group-item-<?= $index ?>"><?= Directive::pre($group->getLabel()) ?></h4><?php

                                $rows = [];
                                foreach ($group as $setting) {
                                    /** @var Setting $setting */
                                    $rows[] =
                                        '<tr>'
                                            . '<td>' . Directive::pre($setting->getName()) . '</td>'
                                            . '<td>' . Directive::pre($setting->getLabel()) . '</td>'
                                            . '<td>' . Directive::pre($setting->getDescription()) . '</td>'
                                            . '<td>' . Directive::pre($setting->getValue()) . '</td>'
                                        . '</tr>';
                                }

                                ?><table class="table table-hover colfl-p10">
                                    <thead>
                                        <tr>
                                            <th>Key</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody><?= implode("\n", $rows) ?></tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
