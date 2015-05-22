<?php

class PultController extends BaseController {

	public function index()
	{
             //return View::make('index');
	}
        
        public function setStatus($userid, $status){
            //$orgs = DB::select('select org_id,name from lara_onlinerecord_organizations');
            //$orgs = DB::table('lara_onlinerecord_organizations')->get();
            //return View::make('org')->with('orgs',$orgs);
        }
        
        public function getCurrentStatus($userid){
            //$orgs = DB::select('select org_id,name from lara_onlinerecord_organizations');
            //$orgs = DB::table('lara_onlinerecord_organizations')->where ('org_id',$org_id)->get();
            //return View::make('/orgs/edit/')->with('orgs',$orgs);
            //return View::make('orgs/edit')->with('orgs',$orgs);
        }

        public function deleteOrg($org_id){
            DB::delete('delete from lara_onlinerecord_organizations where org_id=?', array($org_id));
            return Redirect::route('getOrgsList');
        }

        public function editOrg($org_id){

            $oid=Input::get('org_id');
            $orgname=Input::get('org_name');
            DB::update('update lara_onlinerecord_organizations set name=? where org_id=?',array($orgname,$oid));
            return Redirect::route('getOrgsList');
        }    
        
}


