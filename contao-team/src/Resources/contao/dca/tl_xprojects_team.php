<?php

$GLOBALS['TL_DCA']['tl_xprojects_team'] = array
    (
    'config' => array
        (
        'dataContainer' => 'Table',
        'enableVersioning' => true,
        'sql' => array
            (
            'keys' => array
                (
                'id' => 'primary',
                'name' => 'index',
                'pid' => 'index'
            )
        )
    ),
    'list' => array
        (
        'sorting' => array
            (
            'mode' => 5,
            'fields' => array('sorting'),
            'flag' => 1,
            'panelLayout' => 'filter,search,limit',
            'paste_button_callback' => array('XProjects\\Team\\TeamUtils', 'pasteElement')
        ),
        'label' => array
            (
            'fields' => array('name'),
            'showColumns' => true,
        ),
        'global_operations' => array
            (
            'all' => array
                (
                'label' => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )
        ),
        'operations' => array
            (
            'edit' => array
                (
                'label' => &$GLOBALS['TL_LANG']['tl_xprojects_team']['edit'],
                'href' => 'act=edit',
                'icon' => 'edit.gif'
            ),
            'copy' => array
                (
                'label' => &$GLOBALS['TL_LANG']['tl_xprojects_team']['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif',
            ),
            'cut' => array
                (
                'label' => &$GLOBALS['TL_LANG']['tl_xprojects_team']['cut'],
                'href' => 'act=paste&amp;mode=cut',
                'icon' => 'cut.gif'
            ),
            'toggle' => array
                (
                'label' => &$GLOBALS['TL_LANG']['tl_xprojects_team']['toggle'],
                'icon' => 'visible.gif',
                'attributes' => 'onclick="Backend.getScrollOffset();"',
                'button_callback' => array('XProjects\\Team\\TeamUtils', 'toggleIcon')
            ),
            'delete' => array
                (
                'label' => &$GLOBALS['TL_LANG']['tl_xprojects_team']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
            ),
        )
    ),
    'palettes' => array
        (
        'default' => 'name,published;teaser;desc;mainimage;detailpage;tags'
    ),
    'fields' => array
        (
        'id' => array
            (
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ),
        'pid' => array
            (
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ),
        'tstamp' => array
            (
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ),
        'sorting' => array
            (
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ),
        'name' => array
            (
            'label' => &$GLOBALS['TL_LANG']['tl_xprojects_team']['name'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'inputType' => 'text',
            'eval' => array('mandatory' => true, 'tl_class' => 'clr', 'maxlength' => 250),
            'sql' => "varchar(250) NOT NULL default ''"
        ),
        'published' => array
            (
            'exclude' => true,
            'label' => &$GLOBALS['TL_LANG']['tl_xprojects_team']['published'],
            'inputType' => 'checkbox',
            'eval' => array('doNotCopy' => true, 'tl_class' => 'w50'),
            'sql' => "char(1) NOT NULL default ''"
        ),
        'teaser' => array
            (
            'label' => &$GLOBALS['TL_LANG']['tl_xprojects_team']['teaser'],
            'exclude' => true,
            'inputType' => 'textarea',
            'eval' => array('rte' => 'tinyMCE', 'tl_class' => 'clr'),
            'sql' => "mediumtext NULL"
        ),
        'desc' => array
            (
            'label' => &$GLOBALS['TL_LANG']['tl_xprojects_team']['desc'],
            'exclude' => true,
            'inputType' => 'textarea',
            'eval' => array('rte' => 'tinyMCE', 'tl_class' => 'clr'),
            'sql' => "mediumtext NULL"
        ),
        'mainimage' => array
            (
            'label' => &$GLOBALS['TL_LANG']['tl_xprojects_team']['mainimage'],
            'exclude' => true,
            'inputType' => 'fileTree',
            'eval' => array('filesOnly' => true, 'files' => true, 'fieldType' => 'radio', 'mandatory' => false, 'tl_class' => 'clr'),
            'sql' => "binary(16) NULL",
        ),
        'detailpage' => array
            (
            'label' => &$GLOBALS['TL_LANG']['tl_xprojects_team']['detailpage'],
            'exclude' => true,
            'inputType' => 'pageTree',
            'foreignKey' => 'tl_page.title',
            'eval' => array('fieldType' => 'radio', 'tl_class' => 'clr', 'mandatory' => false),
            'sql' => "int(10) unsigned NOT NULL default '0'",
            'relation' => array('type' => 'hasOne', 'load' => 'eager')
        ),
        'tags' => array
            (
            'label' => &$GLOBALS['TL_LANG']['tl_xprojects_team']['tags'],
            'exclude' => true,
            'inputType' => 'textarea',
            'eval' => array('tl_class' => 'clr'),
            'sql' => "mediumtext NULL"
        )
    )
);
