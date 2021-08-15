<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package News
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Table tl_titelnormen_items
 */
$GLOBALS['TL_DCA']['tl_titelnormen_items'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_titelnormen',
		'switchToEdit'                => true,
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary',
				'pid' => 'index',
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('date'),
			'headerFields'            => array('nachname', 'vorname'),
			'panelLayout'             => 'filter;sort,search,limit',
			'child_record_callback'   => array('tl_titelnormen_items', 'listTitles'),
			'disableGrouping'         => true,
		),
		'global_operations' => array
		(
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
				'label'               => &$GLOBALS['TL_LANG']['tl_titelnormen_items']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_titelnormen_items']['copy'],
				'href'                => 'act=paste&amp;mode=copy',
				'icon'                => 'copy.gif'
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_titelnormen_items']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_titelnormen_items']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_titelnormen_items']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_titelnormen_items']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'default'                     => '{title_legend},title,date,titleNorm;{tournament_legend},tournament,tournamentURL;{publish_legend},published'
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'pid' => array
		(
			'foreignKey'              => 'tl_titelnormen.id',
			'sql'                     => "int(10) unsigned NOT NULL default '0'",
			'relation'                => array('type'=>'belongsTo', 'load'=>'eager')
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_titelnormen_items']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'foreignKey'              => 'tl_titelnormen_categories.name',
			'inputType'               => 'select',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>10, 'tl_class'=>'long'),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		), 
		'titleNorm' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_titelnormen_items']['titleNorm'],
			'default'                 => '',
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class' => 'w50', 'isBoolean' => true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_titelnormen_items']['year'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 10,
				'tl_class'            => 'w50',
				'rgxp'                => 'alnum',
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		), 
		'tournament' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_titelnormen_items']['tournament'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		), 
		'tournamentURL' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_titelnormen_items']['tournamentURL'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		), 
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_titelnormen_items']['published'],
			'default'                 => 1,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class' => 'w50', 'isBoolean' => true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
	)
);


/**
 * Class tl_titelnormen_items
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Leo Feyer 2005-2014
 * @author     Leo Feyer <https://contao.org>
 * @package    News
 */
class tl_titelnormen_items extends Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	public function listTitles($arrRow)
	{
		$temp = '<div class="tl_content_left">';
		if($arrRow['date']) $temp .= \Schachbulle\ContaoHelperBundle\Classes\Helper::getDate($arrRow['date']);
		if($arrRow['titleNorm']) $temp .= ' [Norm]';
		else $temp .= ' [Titel]';
		if($arrRow['title']) $temp .= ' <b>' . self::getTitelname($arrRow['title']) . '</b>';
		return $temp.'</div>';
	}

	public function getTitelname($id)
	{
		$temp = $id;
		$result = \Database::getInstance()->prepare("SELECT name FROM tl_titelnormen_categories WHERE id = ?")
		                                  ->execute($id);
		return $result->name;
	}
	
	/**
	 * �ndert das Aussehen des Toggle-Buttons.
	 * @param $row
	 * @param $href
	 * @param $label
	 * @param $title
	 * @param $icon
	 * @param $attributes
	 * @return string
	 */
	public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
	{
		$this->import('BackendUser', 'User');
		
		if (strlen($this->Input->get('tid')))
		{
			$this->toggleVisibility($this->Input->get('tid'), ($this->Input->get('state') == 0));
			$this->redirect($this->getReferer());
		}
		
		// Check permissions AFTER checking the tid, so hacking attempts are logged
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_titelnormen_items::published', 'alexf'))
		{
			return '';
		}
		
		$href .= '&amp;id='.$this->Input->get('id').'&amp;tid='.$row['id'].'&amp;state='.$row[''];
		
		if (!$row['published'])
		{
			$icon = 'invisible.gif';
		}
		
		return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
	}

	/**
	 * Toggle the visibility of an element
	 * @param integer
	 * @param boolean
	 */
	public function toggleVisibility($intId, $blnPublished)
	{
		// Check permissions to publish
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_titelnormen_items::published', 'alexf'))
		{
			$this->log('Not enough permissions to show/hide record ID "'.$intId.'"', 'tl_titelnormen_items toggleVisibility', TL_ERROR);
			$this->redirect('contao/main.php?act=error');
		}
		
		$this->createInitialVersion('tl_titelnormen_items', $intId);
		
		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA']['tl_titelnormen_items']['fields']['published']['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA']['tl_titelnormen_items']['fields']['published']['save_callback'] as $callback)
			{
				$this->import($callback[0]);
				$blnPublished = $this->$callback[0]->$callback[1]($blnPublished, $this);
			}
		}
		
		// Update the database
		$this->Database->prepare("UPDATE tl_titelnormen_items SET tstamp=". time() .", published='" . ($blnPublished ? '' : '1') . "' WHERE id=?")
		               ->execute($intId);
		$this->createNewVersion('tl_titelnormen', $intId);
	}

}
