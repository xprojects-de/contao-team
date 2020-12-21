<?php

declare(strict_types=1);

namespace XProjects\Team\Events;

use Alpdesk\AlpdeskFrontendediting\Events\AlpdeskFrontendeditingEventElement;

class TeamAlpdeskFrontendViewListener {

  private static $icon = '../../../system/themes/flexible/icons/user.svg';
  private static $iconclass = 'tl_team_baritem';

  public function __invoke(AlpdeskFrontendeditingEventElement $event): void {

    if ($event->getElement()->type === 'xproject_team') {
      $event->getItem()->setValid(true);
      $event->getItem()->setIcon(self::$icon);
      $event->getItem()->setIconclass(self::$iconclass);
      $event->getItem()->setPath('do=xprojects_team');
      $event->getItem()->setLabel($GLOBALS['TL_LANG']['team_label']);
    }
  }

}
