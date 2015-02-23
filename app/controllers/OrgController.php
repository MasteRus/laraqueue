<?php

class OrgController extends BaseController {

	public function index()
	{
             return View::make('index');
	}
        
        public function getOrgsList(){
            //$orgs = DB::select('select org_id,name from lara_onlinerecord_organizations');
            $orgs = DB::table('lara_onlinerecord_organizations')->get();
            return View::make('org')->with('orgs',$orgs);
        }
        
        public function getOrg($org_id){
            //$orgs = DB::select('select org_id,name from lara_onlinerecord_organizations');
            $orgs = DB::table('lara_onlinerecord_organizations')->where ('org_id',$org_id)->get();
            //return View::make('/orgs/edit/')->with('orgs',$orgs);
            return View::make('orgs/edit')->with('orgs',$orgs);
        }

        public function editOrgSave($org_id, $orgname){
            //$orgs = DB::table('lara_onlinerecord_organizations')
            //        ->where ('org_id',$org_id)
            //        ->update(array('name' => $orgname));
            //var_dump($orgs);
            //return Redirect::route('orgs');
            return View::make('index');
        }
         
}
