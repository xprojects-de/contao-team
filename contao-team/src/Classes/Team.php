<?php

namespace XProjects\Team\Classes;

use XProjects\Team\TeamUtils;

class Team extends \ContentElement {

  protected $strTemplate = 'team_overview';
  private $globalTags = array();

  public function generate() {
    if (TL_MODE === 'BE') {
      $template = new \BackendTemplate('be_wildcard');
      $template->wildcard = '### TEAM ###';
      return $template->parse();
    }
    return parent::generate();
  }

  protected function compile() {
    $assetsDir = 'bundles/team';
    $GLOBALS['TL_JAVASCRIPT'][] = $assetsDir . '/js/jquery.lazy.min.js|static';
    $GLOBALS['TL_JAVASCRIPT'][] = $assetsDir . '/js/team.js|static';
    $GLOBALS['TL_CSS'][] = $assetsDir . '/css/team.css|static';
    $this->Template->data = $this->getTeam();
    $this->Template->tags = $this->globalTags;
    $this->Template->search = (intval($this->xprojectsshowsearch) == 1);
  }

  private function getTeam() {
    $this->globalTags = array();
    $data = array();
    $referencearray = array();
    if ($this->xprojects_team != '') {
      $tmp = deserialize($this->xprojects_team);
      if (is_array($tmp)) {
        $referencearray = $tmp;
      }
    }
    $teamsObj = \Database::getInstance()->prepare("SELECT * FROM tl_xprojects_team WHERE published=? ORDER BY sorting ASC")->execute(1);
    if ($teamsObj->numRows > 0) {
      while ($teamsObj->next()) {
        if (!in_array($teamsObj->id, $referencearray)) {
          continue;
        }
        $mainimage = '';
        $mainImageData = TeamUtils::xGetImage($teamsObj->mainimage);
        if ($mainImageData['imgsrc'] != '') {
          $mainimage = $mainImageData['imgsrc'];
        }

        $detailLInk = '';
        if ($teamsObj->detailpage != 0) {
          $detailLInk = \Controller::replaceInsertTags('{{link_url::' . $teamsObj->detailpage . '}}');
        }
        $tags = array();
        if (intval($this->xprojectsshowtags) == 1) {
          if ($teamsObj->tags != "") {
            $tmp = explode(',', $teamsObj->tags);
            foreach ($tmp as $tag) {
              array_push($tags, trim($tag));
              if (!in_array(trim($tag), $this->globalTags)) {
                array_push($this->globalTags, trim($tag));
              }
            }
          }
        }
        array_push($data, array(
            'id' => $teamsObj->id,
            'name' => $teamsObj->name,
            'teaser' => $teamsObj->teaser,
            'image' => $mainimage,
            'link' => $detailLInk,
            'tags' => implode(',', $tags)
        ));
      }
    }
    return $data;
  }

}
