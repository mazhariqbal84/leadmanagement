<?php

/** ----------------------------------------------------------------------------------------------------------------------------------------
 * [NOTES]
 *  - see the file 'application/updating/updating_examples.php' for instructions and examplees
 *
 *-------------------------------------------------------------------------------------------------------------------------------------------*/

/**
 * @date - August 2022
 *
 * @version - 1.11
 *
 * @details
 *  - update for the [file folders] feature
 *
 */
function cronjob_updating_1_11_part_1() {

    //log
    Log::info("updating function (file folders feature) has started", ['process' => '[updating-functions]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'project_id' => 1]);

    //get default folders
    $default_folder = \App\Models\FileFolder::Where('filefolder_id', 1)->first();

    //get all the projects
    $projects = \App\Models\Project::get();

    //create defaultfolders for each project
    foreach ($projects as $project) {

        //create a new default folder
        $folder = new \App\Models\FileFolder();
        $folder->filefolder_name = $default_folder->filefolder_name;
        $folder->filefolder_creatorid = 0;
        $folder->filefolder_projectid = $project->project_id;
        $folder->filefolder_default = 'yes';
        $folder->filefolder_system = 'no';
        $folder->save();

        //update all project files
        \App\Models\File::where('fileresource_type', 'project')
            ->where('fileresource_id', $project->project_id)
            ->update([
                'file_folderid' => $folder->filefolder_id,
            ]);
    }

    //log
    Log::info("updating function (file folders feature) has completed", ['process' => '[updating-functions]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'project_id' => 1]);

}

/**
 *
 * @date - August 2022
 *
 * @version - 1.12 (when releasing spaces)
 *
 * @details
 *  - updates for the [spaces] feature
 *
 */
function cronjob_updating_1_11_part_2() {

    /**-----------------------------------------------------------------------
     * (1) CREATE A SPACE FOR EACH TEAM MEMBER
     *----------------------------------------------------------------------*/

    //log
    Log::info("updating function (spaces feature) has started", ['process' => '[updating-functions]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'project_id' => 1]);

    //get all active team members
    $users = \App\Models\User::Where('type', 'team')->where('status', 'active')->orderBy('id', 'asc')->get();

    //create a count, to add uniqueness to the project id
    $count = 1;

    //loop all users aand create their space
    foreach ($users as $user) {

        //create a space for this user
        $space = new \App\Models\Project();
        $space->project_uniqueid = str_unique();
        $space->project_id = -(time() + $count);
        $space->project_type = 'space';
        $space->project_creatorid = 0;
        $space->project_title = config('system.settings2_spaces_user_space_title');
        $space->project_reference = 'default-user-space';
        $space->save();

        //update the user's database recrd with the new space, unique id
        $user->space_uniqueid = $space->project_uniqueid;
        $user->save();

        //assign the user to the new space
        $assigned = new \App\Models\ProjectAssigned();
        $assigned->projectsassigned_projectid = $space->project_id;
        $assigned->projectsassigned_userid = $user->id;
        $assigned->save();

        //create a default folder for the [files] feature, in the space
        $folder = new \App\Models\FileFolder();
        $folder->filefolder_creatorid = 0;
        $folder->filefolder_projectid = $space->project_id;
        $folder->filefolder_name = config('system.settings2_spaces_user_files_default_folder_name');
        $folder->filefolder_default = 'yes';
        $folder->filefolder_system = 'no';
        $folder->save();

        //small pause
        $count++;
    }

    /**-----------------------------------------------------------------------
     * (1) CREATE THE DEFAULT SHARED SPACE, FOR ALL TEAM MEMBERS
     *----------------------------------------------------------------------*/

    //continue with the count from above, to add uniqueness to the project id
    $count++;

    //create the team space
    $space = new \App\Models\Project();
    $space->project_uniqueid = str_unique();
    $space->project_id = -(time() - $count);
    $space->project_type = 'space';
    $space->project_creatorid = 0;
    $space->project_title = config('system.settings2_spaces_team_space_title');
    $space->project_reference = 'default-team-space';
    $space->save();

    //create a default folder for the [files] feature, in the space
    $folder = new \App\Models\FileFolder();
    $folder->filefolder_creatorid = 0;
    $folder->filefolder_projectid = $space->project_id;
    $folder->filefolder_name = 'Default';
    $folder->filefolder_default = 'yes';
    $folder->filefolder_system = 'no';
    $folder->save();

    //save the unique id of the space, in the settings table
    \App\Models\Settings2::where('settings2_id', 1)
        ->update([
            'settings2_spaces_team_space_id' => $space->project_uniqueid,
        ]);

    //assign all team members to this soace
    foreach ($users as $user) {
        $assigned = new \App\Models\ProjectAssigned();
        $assigned->projectsassigned_projectid = $space->project_id;
        $assigned->projectsassigned_userid = $user->id;
        $assigned->save();
    }

    //log
    Log::info("updating function (spaces feature) has completed", ['process' => '[updating-functions]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'project_id' => 1]);

}