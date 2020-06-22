<?php

$GLOBALS['TL_DCA']['tl_content']['palettes']['xproject_team'] = '{type_legend},type;xprojects_team;xprojectsshowtags,xprojectsshowsearch;{expert_legend:hide},cssID;';

$GLOBALS['TL_DCA']['tl_content']['fields']['xprojects_team'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['xprojects_team'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'foreignKey' => 'tl_xprojects_team.name',
    'eval' => array('multiple' => true, 'mandatory' => true),
    'sql' => "mediumtext NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['xprojectsshowtags'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['xprojectsshowtags'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => array('doNotCopy' => true, 'tl_class' => 'w50'),
    'sql' => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['xprojectsshowsearch'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_content']['xprojectsshowsearch'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => array('doNotCopy' => true, 'tl_class' => 'w50'),
    'sql' => "char(1) NOT NULL default ''"
);

