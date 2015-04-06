<?php
/**
 * Created by PhpStorm.
 * User: Pubudu
 * Date: 4/6/2015
 * Time: 10:35 PM
 */

namespace Athwela\TimelineBundle\Queries;

use Athwela\DA\CustomQuery\CustomQuery;

class TimelineQueryBuilder {

    public function getProjects() {
        $query = "SELECT name, title, project.description, project.status, start_date, end_date, volunteers_needed, no_of_filled_positions, posted_date FROM `organization` INNER JOIN project ON organization.ID = project.o_ID";

    }
}