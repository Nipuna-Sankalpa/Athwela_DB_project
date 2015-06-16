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

    public function getAvailableProjects() {
//        $query = "SELECT project.ID,organization.name, title, project.description, project.status, start_date, end_date, volunteers_needed, no_of_filled_positions, posted_date FROM `organization` INNER JOIN project ON organization.ID = project.o_ID ORDER BY posted_date DESC";
        $query = "SELECT project.ID,organization.name, title, project.description, project.status, start_date, end_date, volunteers_needed, no_of_filled_positions, posted_date, img_URL FROM `organization` "
                    ."INNER JOIN project ON organization.ID = project.o_ID "
                    ."LEFT JOIN `project_img` ON project.ID = project_img.p_ID "
                    ."GROUP BY project.ID ORDER BY posted_date DESC";
        $result = CustomQuery::getInstance() -> customQuery($query);
        return $result;
    }

    public function getTimelinePostImages(){
        $query = "SELECT project.ID, img_URL, posted_date FROM `project` LEFT JOIN `project_img` ON project.ID = project_img.p_ID GROUP BY project.ID ORDER BY posted_date DESC";
        $result = CustomQuery::getInstance() -> customQuery($query);
        return $result;
    }
}