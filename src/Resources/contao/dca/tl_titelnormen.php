<?php

/**
 * Tabelle tl_titelnormen
 */
$GLOBALS['TL_DCA']['tl_titelnormen'] = array
(

	// Konfiguration
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_titelnormen_items'),
		'switchToEdit'                => true, 
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		),
	),

	// Datensätze auflisten
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 2,
			'fields'                  => array('nachname','vorname'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;sort,search,limit',
		),
		'label' => array
		(
			'fields'                  => array('nachname','vorname','ort'),
			'showColumns'             => true,
			'format'                  => '%s',
		),
		'global_operations' => array
		(
			'categories' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_titelnormen']['categories'],
				'href'                => 'table=tl_titelnormen_categories',
				'icon'                => 'bundles/contaotitelnormen/images/categories.png',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_titelnormen']['edit'],
				'href'                => 'table=tl_titelnormen_items',
				'icon'                => 'edit.svg'
			),
			'editheader' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_titelnormen']['editheader'],
				'href'                => 'act=edit',
				'icon'                => 'header.svg'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_titelnormen']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif',
			),
			'cut' => array(
				'label'               => &$GLOBALS['TL_LANG']['tl_titelnormen']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif',
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_titelnormen']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'toggle' => array
			(
				'label'                => &$GLOBALS['TL_LANG']['tl_titelnormen']['toggle'],
				'attributes'           => 'onclick="Backend.getScrollOffset()"',
				'haste_ajax_operation' => array
				(
					'field'            => 'published',
					'options'          => array
					(
						array('value' => '', 'icon' => 'invisible.svg'),
						array('value' => '1', 'icon' => 'visible.svg'),
					),
				),
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_titelnormen']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif',
				'attributes'          => 'style="margin-right:3px"'
			),
		)
	),

	// Paletten
	'palettes' => array
	(
		'default'                     => '{person_legend},nachname,vorname,titel,death;{adresse_legend:hide},ort;{member_legend:hide},memberId,worldId,singleSRC;{web_legend:hide},wikipedia;{text_legend:hide},text;{publish_legend},published'
	),

	// Felder
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_titelnormen']['tstamp'],
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'nachname' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_titelnormen']['nachname'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'filter'                  => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'vorname' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_titelnormen']['vorname'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'titel' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_titelnormen']['titel'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'search'                  => false,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>64, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'death' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_titlenormen']['death'],
			'inputType'               => 'checkbox',
			'filter'                  => true,
			'eval'                    => array('submitOnChange'=>false, 'tl_class'=>'clr'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'memberId' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_titelnormen']['memberId'],
			'exclude'                 => true,
			'search'                  => false,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>10, 'tl_class'=>'w50'),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'worldId' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_titelnormen']['worldId'],
			'exclude'                 => true,
			'search'                  => false,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>10, 'tl_class'=>'w50'),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'ort' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_titelnormen']['ort'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'filter'                  => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'singleSRC' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_titelnormen']['singleSRC'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array
			(
				'filesOnly'           => true,
				'extensions'          => Config::get('validImageTypes'),
				'fieldType'           => 'radio',
				'tl_class'            => 'w50',
				'mandatory'           => false
			),
			'sql'                     => "binary(16) NULL"
		), 
		'wikipedia' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_titelnormen']['wikipedia'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		), 
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_titelnormen']['published'],
			'exclude'                 => true,
			'filter'                  => true,
			'default'                 => true,
			'inputType'               => 'checkbox',
			'sql'                     => "char(1) NOT NULL default ''"
		),
	)
);

/**
 * Class tl_member_aktivicon
 */
class tl_titelnormen extends Backend
{
}
