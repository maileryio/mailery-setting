<?php declare(strict_types=1);

use Mailery\Setting\Model\Setting;
use Mailery\Setting\Model\SettingGroup;

/** @var Yiisoft\Yii\WebView $this */
/** @var Yiisoft\Aliases\Aliases $aliases */
/** @var Yiisoft\Router\UrlGeneratorInterface $urlGenerator */
/** @var Mailery\Setting\Model\SettingGroupList $groupList */
/** @var Yiisoft\Yii\View\Csrf $csrf */

$this->setTitle('System settings');

?><div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h3">System settings</h1>
        </div>
    </div>
</div>
<div class="mb-2"></div>
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-3">
                <b-list-group v-b-scrollspy="{element: '#setting-group-list', offset: 50}" style="position: sticky;top: 80px;">
                    <?php foreach ($groupList as $index => $group) {
                        /** @var SettingGroup $group */
                        ?><b-list-group-item href="#setting-group-item-<?= $index ?>"><?= $group->getLabel() ?></b-list-group-item><?php
                    } ?>
                </b-list-group>
            </div>
            <div class="col-9">
                <div id="setting-group-list">
                    <?php foreach ($groupList as $index => $group) {
                        /** @var SettingGroup $group */
                        ?><h4 id="setting-group-item-1"><?= $group->getLabel() ?></h4><?php

                        $rows = [];
                        foreach ($group as $setting) {
                            /** @var Setting $setting */
                            $rows[] =
                                '<tr>'
                                    . '<td>' . $setting->getName() . '</td>'
                                    . '<td>' . $setting->getLabel() . '</td>'
                                    . '<td>' . $setting->getDescription() . '</td>'
                                    . '<td>' . $setting->getValue() . '</td>'
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
                        </table><?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
