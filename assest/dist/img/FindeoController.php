<?php

namespace App\Http\Middleware;

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Input;
use App\Http\Requests;

use App\User;
use Session;
use View;
use DB;
use Auth;
use Validator;
use Redirect;

class FindeoController extends BaseController
{
    function index(){
        return view('findeo.index');
    }
      function Business(){
        $state = DB::table('state_country')->select('state')->groupBy('state')->orderBy('state', 'ASC')->get();
            return View::make('findeo.business',['state' => $state]);
    }

      function Property(){
        $state = DB::table('state_country')->select('state')->groupBy('state')->orderBy('state', 'ASC')->get();
            return View::make('findeo.porperty',['state' => $state]);
        // return view('findeo.porperty');
    }
    
      function New_Franchise(){
        return view('findeo.new_franchise');
    }
    
     function Established_Franchise(){

       $state = DB::table('state_country')->select('state')->groupBy('state')->orderBy('state', 'ASC')->get();
            return View::make('findeo.established_franchise',['state' => $state]);
        // return view('findeo.established_franchise');
    }

    function Listing(){
      $data = DB::table('business_listing')->paginate(10);
      return View::make('findeo.all_Listing',['data' => $data]);
       
    }

      function FAQ(){
        return view('findeo.faq');
    }

    function Property_Show(){
        return view('findeo.single_show');
    }

    function My_Account(){
      $userid = Auth::user()->id;
       $useraccount = DB::table('business_listing')->where('user_id', $userid)->paginate(7);
        return View::make('Myprofile.myaccount',['data' => $useraccount]);//
       // return view('Myprofile.myaccount');
    } 

    function findocountryselect(Request $request){
      $stateid = $request->stateid;
      $stateidddd = DB::table('state_country')->select('country')->where('state', $stateid)->groupBy('country')->orderBy('country', 'ASC')->get();
     // $stateidddd = DB::table('state_country')->where('state',$stateid)->get();
    ?>
     
        <option value="">Select County</option> 
            <?php foreach($stateidddd as $market) { ?>
              <option value="<?php echo $market->country;?>"><?php echo $market->country; ?></option>
           <?php } ?>
      

       <?php } 


       function findocountry_nameselect(Request $request){
          $country_name = $request->country_name;
          $select_state = $request->selectstate;

          $country_name_select = DB::table('state_country')->select('City')->where('country','=',$country_name)->where('state','=',$select_state)->orderBy('City', 'ASC') ->get(); 
            ?>

              <option value="">Select City</option>
             <?php foreach($country_name_select as $markettt) { ?>
                  <option value="<?php echo $markettt->City;?>"><?php echo $markettt->City; ?></option>
                   <?php } ?>
       <?php }


       function listing_search(Request $request){
         $listing = $request->input('listing');
         $listing_type = $request->input('listing_type');
         
          $data = DB::table('business_listing')->where('type','like','%'.$listing.'%')->get();
           return View::make('findeo.all_Listing',['data' => $data]);

       }



  





    function Add_Business(Request $request){
      if (Auth::check())
      {
        // BUSINESS LISTING
        $type = $request-> input('type');
        $user_id = $request->input('user_id');
        $username = $request->input('user_name');
        $industry_type1 = $request->input('industry_type1');
        $industry_type2 = $request->input('industry_type2');  
        $ListingTitle = $request->input('ListingTitle');
        $ListingAddress = $request->input('ListingAddress');
        $ListingDescription = $request->input('ListingDescription');
        $City = $request->input('City');
        $State = $request->input('State');
        $Zip = $request->input('Zip');
        $Country = $request->input('Country');
        $KeepAddressConfidential = $request->input('KeepAddressConfidential');
        $ApplyAddress = $request->input('AllApply');
         if  ($ApplyAddress == "" ){
                $AllApplyyy = "(Null)";
               }else{
                  $AllApplyyy= implode(',', $ApplyAddress);
               }


        // FINANCIAL DETAILS
        $F_ListingPrice = $request->input('ListingPrice');     
        $realInclude = $request-> input('realInclude');
         $realIncludeall= implode(',', $realInclude);


        $OwnerFinancing = $request->input('OwnerFinancing');
        $AnnualRevenue = $request->input('AnnualRevenue');  
        $AdjustedEarnings = $request->input('AdjustedEarnings');
        $EquipmentValue = $request->input('EquipmentValue');
        $EquipmentDescription = $request->input('EquipmentDescription');
        $IsInventoryIncluded = $request->input('IsInventoryIncluded');
        $InventoryValue = $request->input('InventoryValue');

        // PROPERTY DETAILS

        $LeaseType = $request-> input('LeaseType');
        $LeasePrice = $request->input('LeasePrice');
        $BuildingSquareFeet = $request->input('BuildingSquareFeet');  
        $LotSize = $request->input('LotSize');
        $NumberofBayDoors = $request->input('NumberofBayDoors');
        $NumberofLifts = $request->input('NumberofLifts');
        $NumberofStalls = $request->input('NumberofStalls');
        $NumberofParkingSpaces = $request->input('NumberofParkingSpaces');
        $Zoning = $request->input('Zoning');
        $BuildingTypee = $request->input('BuildingType');
        $B_Type= implode(',', $BuildingTypee);

        //   ADDITIONAL DETAILS 
        
        $ReasonforSelling = $request-> input('ReasonforSelling');
        $TrainingAssistanceAvailable = $request->input('TrainingAssistanceAvailable');
        $BusinesswasEstablished = $request->input('BusinesswasEstablished');  
        $HowManyDays = $request->input('HowManyDays');

        // EMPLOYEES
        $NumberofTechnicians = $request->input('NumberofTechnicians');
        $NumberofManagers = $request->input('NumberofManagers');
        $NumberofOfficeStaff = $request->input('NumberofOfficeStaff');
        $NumberofHelpers = $request->input('NumberofHelpers');

        // REAL ESTATE
        $InHouseReferenceNumber = $request->input('InHouseReferenceNumber');
        $SalesAgentBrokerName = $request->input('SalesAgentBrokerName');

        $imagess = $request->input('image_name');
        $files = $request->input('file_name');

        $buttan_status = $request->input('submitsss');
        $Videos = $request->input('Videos');
        $imagee = $request->file('feature_img');
        if  ($imagee == ""){
          $name = '(Null)';
          }
            else{
             // $request->validate([
             //  'featured_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             //   ]);
            $name = time().'.'.$imagee->getClientOriginalExtension();
            $path = public_path('/image_upload');
            $imagee->move($path, $name);
              }

        $data=array(
          "type" => $type,'user_id'=>$user_id,'industry_type1'=>$industry_type1,"industry_type2"=>$industry_type2,"listing_title"=>$ListingTitle,"listign_des"=>$ListingDescription,"listing_address"=>$ListingAddress,"state"=>$State,"city"=>$City,"zip_code"=>$Zip,"county"=>$Country,"address_confidential"=>$KeepAddressConfidential,"apply_place"=>$AllApplyyy,

          "f_listing_price"=>$F_ListingPrice,"f_real_state_ask_price"=>$realIncludeall,"f_owner_financy"=>$OwnerFinancing,"f_annual_renew"=>$AnnualRevenue,"f_adjusted_e_learn"=>$AdjustedEarnings,"f_equmpnt_value"=>$EquipmentValue,"f_equmpnt_des"=>$EquipmentDescription,"f_inventory_include"=>$IsInventoryIncluded,"f_inventory_value"=>$InventoryValue,

          "p_lease_typ"=>$LeaseType,"p_lease_rs"=>$LeasePrice,"p_building_sq_ft"=>$BuildingSquareFeet,"p_lot_size"=>$LotSize,"p_bay_doors"=>$NumberofBayDoors,"p_no_lifts"=>$NumberofLifts,"p_no_stalls"=>$NumberofStalls,"p_no_parking_space"=>$NumberofParkingSpaces,"p_zoning"=>$Zoning,"p_building_type"=>$B_Type,

          "reason_selling"=>$ReasonforSelling,"establis_business"=>$BusinesswasEstablished,"available_assistance"=>$TrainingAssistanceAvailable,"many_days"=>$HowManyDays,

           "no_technicians"=>$NumberofTechnicians,"no_manager"=>$NumberofManagers,"no_office_staff"=>$NumberofOfficeStaff,"no_helpers"=>$NumberofHelpers,

           "agnt_refer_no"=>$InHouseReferenceNumber,"agnt_name"=>$SalesAgentBrokerName,"video"=>$Videos,"feature_image"=>$name,"images"=>$imagess,"files"=>$files,"status"=>$buttan_status,"user_name"=>$username,"created_time"=>now());

              DB::table('business_listing')->insert($data);

              return Redirect::to('/Business')->with('success','Data Insert Successfully');

      }else{
        return redirect()->back()->withErrors('Error','Please Check');
        // return back()->with('Error','Please Check');
       // return Redirect::with('Error','Please Check');
      }

    }


 function update_business_listing($id){
    
    $iddd =DB::table('business_listing')->find($id);
    $state = DB::table('state_country')->select('state')->groupBy('state')->orderBy('state', 'ASC')->get();
      return view::make('findeo.updatebusiness_listing',['business_update' => $iddd],['state' => $state]); 
  }


     function update_Business(Request $request){
      if (Auth::check())
      {
        // BUSINESS LISTING
        $type = $request-> input('type');
        $user_id = $request->input('user_id');
        $username = $request->input('user_name');
        $industry_type1 = $request->input('industry_type1');
        $industry_type2 = $request->input('industry_type2');  
        $ListingTitle = $request->input('ListingTitle');
        $ListingAddress = $request->input('ListingAddress');
        $ListingDescription = $request->input('ListingDescription');
        $City = $request->input('City');
        $State = $request->input('State');
        $Zip = $request->input('Zip');
        $Country = $request->input('Country');
        $KeepAddressConfidential = $request->input('KeepAddressConfidential');
        $ApplyAddress = $request->input('AllApply');
         if  ($ApplyAddress == "" ){
                $AllApplyyy = "(Null)";
               }else{
                  $AllApplyyy= implode(',', $ApplyAddress);
               }


        // FINANCIAL DETAILS
        $F_ListingPrice = $request->input('ListingPrice');     
        $realInclude = $request-> input('realInclude');
         $realIncludeall= implode(',', $realInclude);


        $OwnerFinancing = $request->input('OwnerFinancing');
        $AnnualRevenue = $request->input('AnnualRevenue');  
        $AdjustedEarnings = $request->input('AdjustedEarnings');
        $EquipmentValue = $request->input('EquipmentValue');
        $EquipmentDescription = $request->input('EquipmentDescription');
        $IsInventoryIncluded = $request->input('IsInventoryIncluded');
        $InventoryValue = $request->input('InventoryValue');

        // PROPERTY DETAILS

        $LeaseType = $request-> input('LeaseType');
        $LeasePrice = $request->input('LeasePrice');
        $BuildingSquareFeet = $request->input('BuildingSquareFeet');  
        $LotSize = $request->input('LotSize');
        $NumberofBayDoors = $request->input('NumberofBayDoors');
        $NumberofLifts = $request->input('NumberofLifts');
        $NumberofStalls = $request->input('NumberofStalls');
        $NumberofParkingSpaces = $request->input('NumberofParkingSpaces');
        $Zoning = $request->input('Zoning');
        $BuildingTypee = $request->input('BuildingType');
        $B_Type= implode(',', $BuildingTypee);

        //   ADDITIONAL DETAILS 
        
        $ReasonforSelling = $request-> input('ReasonforSelling');
        $TrainingAssistanceAvailable = $request->input('TrainingAssistanceAvailable');
        $BusinesswasEstablished = $request->input('BusinesswasEstablished');  
        $HowManyDays = $request->input('HowManyDays');

        // EMPLOYEES
        $NumberofTechnicians = $request->input('NumberofTechnicians');
        $NumberofManagers = $request->input('NumberofManagers');
        $NumberofOfficeStaff = $request->input('NumberofOfficeStaff');
        $NumberofHelpers = $request->input('NumberofHelpers');

        // REAL ESTATE
        $InHouseReferenceNumber = $request->input('InHouseReferenceNumber');
        $SalesAgentBrokerName = $request->input('SalesAgentBrokerName');

        $imagess = $request->input('image_name');
        $files = $request->input('file_name');

        $buttan_status = $request->input('submitsss');
        $Videos = $request->input('Videos');
        $imagee = $request->file('feature_img');
        $updateid = $request->input('id');

        if  ($imagee == ""){
          $name = '(Null)';
          }
            else{
             // $request->validate([
             //  'featured_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             //   ]);
            $name = time().'.'.$imagee->getClientOriginalExtension();
            $path = public_path('/image_upload');
            $imagee->move($path, $name);
              }

        $update_busnis=array(
          "type" => $type,'user_id'=>$user_id,'industry_type1'=>$industry_type1,"industry_type2"=>$industry_type2,"listing_title"=>$ListingTitle,"listign_des"=>$ListingDescription,"listing_address"=>$ListingAddress,"state"=>$State,"city"=>$City,"zip_code"=>$Zip,"county"=>$Country,"address_confidential"=>$KeepAddressConfidential,"apply_place"=>$AllApplyyy,

          "f_listing_price"=>$F_ListingPrice,"f_real_state_ask_price"=>$realIncludeall,"f_owner_financy"=>$OwnerFinancing,"f_annual_renew"=>$AnnualRevenue,"f_adjusted_e_learn"=>$AdjustedEarnings,"f_equmpnt_value"=>$EquipmentValue,"f_equmpnt_des"=>$EquipmentDescription,"f_inventory_include"=>$IsInventoryIncluded,"f_inventory_value"=>$InventoryValue,

          "p_lease_typ"=>$LeaseType,"p_lease_rs"=>$LeasePrice,"p_building_sq_ft"=>$BuildingSquareFeet,"p_lot_size"=>$LotSize,"p_bay_doors"=>$NumberofBayDoors,"p_no_lifts"=>$NumberofLifts,"p_no_stalls"=>$NumberofStalls,"p_no_parking_space"=>$NumberofParkingSpaces,"p_zoning"=>$Zoning,"p_building_type"=>$B_Type,

          "reason_selling"=>$ReasonforSelling,"establis_business"=>$BusinesswasEstablished,"available_assistance"=>$TrainingAssistanceAvailable,"many_days"=>$HowManyDays,

           "no_technicians"=>$NumberofTechnicians,"no_manager"=>$NumberofManagers,"no_office_staff"=>$NumberofOfficeStaff,"no_helpers"=>$NumberofHelpers,

           "agnt_refer_no"=>$InHouseReferenceNumber,"agnt_name"=>$SalesAgentBrokerName,"video"=>$Videos,"feature_image"=>$name,"images"=>$imagess,"files"=>$files,"status"=>$buttan_status,"user_name"=>$username,"created_time"=>now());

             DB::table('business_listing')->where('id',$updateid)->update($update_busnis);
            

              return Redirect::to('/My_Account')->with('success','Data Update Successfully');

      }else{
        return redirect()->back()->withErrors('Error','Please Check');
        // return back()->with('Error','Please Check');
       // return Redirect::with('Error','Please Check');
      }

    }



    function Property_Addd(Request $request){
      if (Auth::check()){
          $type = $request-> input('type');
        $user_id = $request->input('user_id');
        $username = $request->input('user_name');
        $industry_type1 = $request->input('industry_type1');
        $industry_type2 = $request->input('industry_type2');  
        $ListingTitle = $request->input('ListingTitle');
        $ListingDescription = $request->input('ListingDescription');
        $ListingAddress = $request->input('ListingAddress');
        $City = $request->input('City');
        $State = $request->input('State');
        $Zip = $request->input('Zip');
        $Country = $request->input('Country');
        $KeepAddressConfidential = $request->input('KeepAddressConfidential');

        // FINANCIAL DETAILS

        $F_ListingType = $request->input('ListingType');
        $OwnerFinancing = $request->input('OwnerFinancing');  
        $SalePrice = $request->input('SalePrice');
        $LeasePrice = $request->input('LeasePrice');
        $IsPropertyEquipped = $request->input('IsPropertyEquipped');
        $ReasonforSelling = $request->input('ReasonforSelling');
        $EquipmentValue = $request->input('EquipmentValue');
        $EquipmentDescription = $request->input('EquipmentDescription');

        // PROPERTY DETAILS
        $LeaseType = $request->input('LeaseType');
        $Pro_LeasePrice = $request->input('Pro_LeasePrice');
        $BuildingSquareFeet = $request->input('BuildingSquareFeet');
        $LotSize = $request->input('LotSize');
        $NumberofBayDoors = $request->input('NumberofBayDoors');
        $NumberofLiftss = $request->input('NumberofLiftss');
        $NumberofStalls = $request->input('NumberofStalls');
        $NumberofParkingSpaces = $request->input('NumberofParkingSpaces');
        $Zoning = $request->input('Zoning');
        $BuildingTypee = $request->input('BuildingType');
        $B_Type= implode(',', $BuildingTypee);

        // REAL ESTATE AGENT & BROKER
        $listingCreatedDate = $request->input('listingCreatedDate');
        $InHouseReferenceNumber = $request->input('InHouseReferenceNumber');
        $SalesAgentBrokerName = $request->input('SalesAgentBrokerName');
        $Videos = $request->input('provideos');
        $imagee = $request->file('feature_img');

        $imagess = $request->input('image_name');
        $files = $request->input('file_name');
        $buttan_status = $request->input('submitsss');

        if  ($imagee == ""){
          $name = '(Null)';
          }
            else{
             // $request->validate([
             //  'featured_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             //   ]);
            $name = time().'.'.$imagee->getClientOriginalExtension();
            $path = public_path('/image_upload');
            $imagee->move($path, $name);
              }


          $add_property=array(
          "type" => $type,'user_id'=>$user_id,'industry_type1'=>$industry_type1,"industry_type2"=>$industry_type2,"listing_title"=>$ListingTitle,"listign_des"=>$ListingDescription,"listing_address"=>$ListingAddress,"state"=>$State,"city"=>$City,"zip_code"=>$Zip,"county"=>$Country,"address_confidential"=>$KeepAddressConfidential,
          // financial details
          "f_list_type"=>$F_ListingType,"f_owner_financy"=>$OwnerFinancing,"sale_price"=>$SalePrice,
          "f_leasePrice"=>$LeasePrice , "equipped_property"=>$IsPropertyEquipped,
          "reason_selling"=>$ReasonforSelling,"f_equmpnt_value"=>$EquipmentValue,
          "f_equmpnt_des"=>$EquipmentDescription,
          // Porperty Details
          "p_lease_typ"=>$LeaseType,"p_lease_rs"=>$Pro_LeasePrice,
          "p_building_sq_ft"=>$BuildingSquareFeet,"p_lot_size"=>$LotSize,
          "p_bay_doors"=>$NumberofBayDoors,"p_no_lifts"=>$NumberofLiftss,
          "p_no_stalls"=>$NumberofStalls,"p_no_parking_space"=>$NumberofParkingSpaces,
          "p_zoning"=>$Zoning,"p_building_type"=>$B_Type,

          "p_createdate"=>$listingCreatedDate,"agnt_refer_no"=>$InHouseReferenceNumber,
          "agnt_name"=>$SalesAgentBrokerName,"feature_image"=>$name,"video"=>$Videos,"user_name"=>$username,"images"=>$imagess,"files"=>$files,"status"=>$buttan_status,"created_time"=>now());
          DB::table('business_listing')->insert($add_property);
            return Redirect::to('/Property')->with('success','Data Insert Successfully');
      }else{
        echo 'error';
      }
    }


    function property_update($id){
    
      $update_oid =DB::table('business_listing')->find($id);
      $state = DB::table('state_country')->select('state')->groupBy('state')->orderBy('state', 'ASC')->get();
        return view::make('findeo.property_update',['property_update' => $update_oid],['state' => $state]); 
    }


     function New_Franchise_Add(Request $request){
      if (Auth::check()){
        $type = $request-> input('type');
        $user_id = $request->input('user_id');
         $username = $request->input('user_name');
        $industry_type1 = $request-> input('industry_type1');
        $industry_type2 = $request-> input('industry_type2');
        $FranchiseBrandName = $request-> input('FranchiseBrandName');
        $Franchise_Brand_Name = $request-> input('Franchise_Brand_Name');
        $Listing_Title = $request-> input('Listing_Title');
        $Listing_Description = $request-> input('Listing_Description');

          $Minimum_Cash_Required = $request-> input('Minimum_Cash_Required');
          $LiquidCapitalRequired = $request-> input('LiquidCapitalRequired');
          $NetworthRequired = $request-> input('NetworthRequired');
          $TotalInvestment = $request-> input('TotalInvestment');
          $FranchiceFee = $request-> input('FranchiceFee');
          $TransferFee = $request-> input('TransferFee');
          $RoyaltyFee = $request-> input('RoyaltyFee');
          $VeteranDiscount = $request-> input('VeteranDiscount');

        $TotalUnits = $request-> input('TotalUnits');
        $TrainingAssistanceAvailable = $request-> input('TrainingAssistanceAvailable');
        $YearFounded = $request-> input('YearFounded');
        $FranchisingSince = $request-> input('FranchisingSince');
              // FINANCIAL
          $F_LeasePrice = $request-> input('F_LeasePrice');
          $OwnerFinancing = $request-> input('OwnerFinancing');
          $AnnualRevenue = $request-> input('AnnualRevenue');
          $AdjustedEarning = $request-> input('AdjustedEarning');
          $IsRealEstateIncluded = $request-> input('IsRealEstateIncluded');
          $EquipmentValue = $request-> input('EquipmentValue');
          $EquipmentDescription = $request-> input('EquipmentDescription');
          $IsInventoryIncluded = $request-> input('IsInventoryIncluded');
          $InventoryValue = $request-> input('InventoryValue');
          $ReasonforSelling = $request-> input('ReasonforSelling');
          $YearBussinessEstablished = $request-> input('YearBussinessEstablished');
          $TrainingAssistanceAvailable = $request-> input('TrainingAssistanceAvailable');
          $IfYesHowManyDays = $request-> input('IfYesHowManyDays');
            // PROPERTY
              $LeaseType = $request-> input('LeaseType');
              $P_LeasePrice = $request-> input('P_LeasePrice');
              $BuildingSquareFeet = $request-> input('BuildingSquareFeet');
              $LotSize = $request-> input('LotSize');
              $NumberofBayDoors = $request-> input('NumberofBayDoors');
              $NumberofLifts = $request-> input('NumberofLifts');
              $NumberofStalls = $request-> input('NumberofStalls');
              $NumberofParkingSpaces = $request-> input('NumberofParkingSpaces');
              $Zoning = $request-> input('Zoning');
              $N_P_BuildingType = $request-> input('BuildingType');
              $Po_Bulid_type = implode(',', $N_P_BuildingType);

          $NumberofTechnicians = $request-> input('NumberofTechnicians');
          $NumberofManagers = $request-> input('NumberofManagers');
          $NumberofOfficeStaff = $request-> input('NumberofOfficeStaff');
          $NumberofHelpers = $request-> input('NumberofHelpers');    

              $listingCreatedDate = $request-> input('listingCreatedDate');
              $InHouseReferenceNumber = $request-> input('InHouseReferenceNumber');
              $SalesAgentBrokerName = $request-> input('SalesAgentBrokerName');
              $Videos = $request->input('Videos');
            $image = $request->file('feature_img');

            $imagess = $request->input('image_name');
        $files = $request->input('file_name');
        $buttan_status = $request->input('submitsss');

            if ($image == "")
            { $name = '(Null)';}
            else{
                $request->validate([
                'new_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $name = time().'.'.$image->getClientOriginalExtension();
                $path = public_path('/image_upload');
                $image->move($path, $name);
              }

            $new_fanchise=array(
          "type" => $type,'user_id'=>$user_id,"industry_type1"=>$industry_type1,"industry_type2"=>$industry_type2,"franchise_brand_nmae"=>$FranchiseBrandName,"type_franchise_brand_nmae"=>$Franchise_Brand_Name,"listing_title"=>$Listing_Title,"listign_des"=>$Listing_Description,

            "minimum_case_req"=>$Minimum_Cash_Required,"liquid_capital_req"=>$LiquidCapitalRequired,"networth_req"=>$NetworthRequired,"total_investmnt"=>$TotalInvestment,"franvhise_fee"=>$FranchiceFee,"transfer_fee"=>$TransferFee,"royalty_fee"=>$RoyaltyFee,"veteran_discount"=>$VeteranDiscount,

            "total_units"=>$TotalUnits,"year_founded"=>$YearFounded,"franchising_year"=>$FranchisingSince,

             "f_listing_price"=>$F_LeasePrice,"f_owner_financy"=>$OwnerFinancing,"f_annual_renew"=>$AnnualRevenue,"f_adjusted_e_learn"=>$AdjustedEarning,"f_real_state_ask_price"=>$IsRealEstateIncluded,"f_equmpnt_value"=>$EquipmentValue,"f_equmpnt_des"=>$EquipmentDescription,"f_inventory_include"=>$IsInventoryIncluded,"f_inventory_value"=>$InventoryValue,"reason_selling"=>$ReasonforSelling,"establis_business"=>$YearBussinessEstablished,"available_assistance"=>$TrainingAssistanceAvailable,"many_days"=>$IfYesHowManyDays,

              "p_lease_typ"=>$LeaseType,"p_lease_rs"=>$P_LeasePrice,"p_building_sq_ft"=>$BuildingSquareFeet,"p_lot_size"=>$LotSize,"p_bay_doors"=>$NumberofBayDoors,"p_no_lifts"=>$NumberofLifts,"p_no_stalls"=>$NumberofStalls,"p_no_parking_space"=>$NumberofParkingSpaces,"p_zoning"=>$Zoning,"p_building_type"=>$Po_Bulid_type,

                "no_technicians"=>$NumberofTechnicians,"no_manager"=>$NumberofManagers,"no_office_staff"=>$NumberofOfficeStaff,"no_helpers"=>$NumberofHelpers,
                "p_createdate"=>$listingCreatedDate,"agnt_refer_no"=>$InHouseReferenceNumber,"agnt_name"=>$SalesAgentBrokerName,"feature_image"=>$name,"video"=>$Videos,"user_name"=>$username,"images"=>$imagess,"files"=>$files,"status"=>$buttan_status,"created_time"=>now()
              );

             DB::table('business_listing')->insert($new_fanchise);
             return Redirect::to('/New_Franchise')->with('success','Data Insert Successfully');




      }else{
        echo 'error';
      }

    }

     function Established_Franchise_Add(Request $request){
      if (Auth::check()){
        $type = $request-> input('type');
        $user_id = $request->input('user_id');
        $username = $request->input('user_name');
        $industry_type1 = $request-> input('industry_type1');
        $industry_type2 = $request-> input('industry_type2');
        $FranchiseBrandName = $request-> input('FranchiseBrandName');
        $OthertypeFranchiseBrandName = $request-> input('OthertypeFranchiseBrandName');
        $ListingTitle = $request-> input('ListingTitle');
        $ListingDescription = $request-> input('ListingDescription');

        // ESTABLISHED FRANCHISE OPPORTUNITY DETAILS
        $ListingAddress = $request-> input('ListingAddress');
        $City = $request-> input('City');
        $State = $request-> input('State');
        $Zip = $request-> input('Zip');
        $Country = $request-> input('Country');
        $KeepAddressConfidential = $request-> input('KeepAddressConfidential');
        $AllApply = $request->input('AllApply');
        $Apply_all= implode(',', $AllApply);

        // FINANCIAL DETAILS
        $F_LeasePrice = $request-> input('F_LeasePrice');
        $OwnerFinancing = $request-> input('OwnerFinancing');
        $AnnualRevenue = $request-> input('AnnualRevenue');
        $AdjustedEarnings = $request-> input('AdjustedEarnings');
        $IsRealEstateIncluded = $request-> input('IsRealEstateIncluded');
        $EquipmentValue = $request-> input('EquipmentValue');
        $EquipmentDescription = $request-> input('EquipmentDescription');
        $IsInventoryIncluded = $request-> input('IsInventoryIncluded');
        $InventoryValue = $request-> input('InventoryValue');
        $ReasonforSelling = $request-> input('ReasonforSelling');
        $YearBussinessEstablished = $request-> input('YearBussinessEstablished');
        $TrainingAssistanceAvailable = $request-> input('TrainingAssistanceAvailable');
        $IfYesHowManyDays = $request-> input('IfYesHowManyDays');

        // PROPERTY DETAILS
         $LeaseType = $request-> input('LeaseType');
        $LeasePrice = $request-> input('LeasePrice');
        $BuildingSquareFeet = $request-> input('BuildingSquareFeet');
        $LotSize = $request-> input('LotSize');
        $NumberofBayDoors = $request-> input('NumberofBayDoors');
        $NumberofLifts = $request-> input('NumberofLifts');
        $NumberofStalls = $request-> input('NumberofStalls');
        $NumberofParkingSpaces = $request-> input('NumberofParkingSpaces');
        $Zoning = $request-> input('Zoning');
        $BuildingType = $request-> input('BuildingType');
        $buliding_typ = implode(',', $BuildingType);
        // EMPLOYEES
         $NumberofTechnicians = $request-> input('NumberofTechnicians');
        $NumberofManagers = $request-> input('NumberofManagers');
        $NumberofOfficeStaff = $request-> input('NumberofOfficeStaff');
        $NumberofHelpers = $request-> input('NumberofHelpers');

        $listingCreatedDate = $request-> input('listingCreatedDate');
        $InHouseReferenceNumber = $request-> input('InHouseReferenceNumber');
        $SalesAgentBrokerName = $request-> input('SalesAgentBrokerName');

        $imagess = $request->input('image_name');
        $files = $request->input('file_name');
        $buttan_status = $request->input('submitsss');
        $Videos = $request->input('Videos');


            $image = $request->file('feature_img');
            if ($image == "")
            { $name = '(Null)';}
            else{
                $request->validate([
                'new_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $name = time().'.'.$image->getClientOriginalExtension();
                $path = public_path('/image_upload');
                $image->move($path, $name);
              }

        $addestablished_fanchise=array(
              "type" => $type,"industry_type1"=>$industry_type1,"industry_type2"=>$industry_type2,
              "franchise_brand_nmae"=>$FranchiseBrandName,"type_franchise_brand_nmae"=>$OthertypeFranchiseBrandName,
              "listing_title"=>$ListingTitle,"listign_des"=>$ListingDescription,"listing_address"=>$ListingAddress,
              "city"=>$City,"state"=>$State,"zip_code"=>$Zip,"address_confidential"=>$KeepAddressConfidential,
              "county"=>$Country,"apply_place"=>$Apply_all,

              "f_listing_price"=>$F_LeasePrice,"f_owner_financy"=>$OwnerFinancing,"f_annual_renew"=>$AnnualRevenue,
              "f_adjusted_e_learn"=>$AdjustedEarnings,"f_real_state_ask_price"=>$IsRealEstateIncluded,
               "f_equmpnt_value"=>$EquipmentValue,"f_equmpnt_des"=>$EquipmentDescription,"f_inventory_include"=>$IsInventoryIncluded,"f_inventory_value"=>$InventoryValue,"reason_selling"=>$ReasonforSelling,
               "establis_business"=>$YearBussinessEstablished,"available_assistance"=>$TrainingAssistanceAvailable,

               "many_days"=>$IfYesHowManyDays,"p_lease_typ"=>$LeaseType,"p_lease_rs"=>$LeasePrice,"p_building_sq_ft"=>$BuildingSquareFeet,"p_lot_size"=>$LotSize,"p_bay_doors"=>$NumberofBayDoors,"p_no_lifts"=>$NumberofLifts,
               "p_no_stalls"=>$NumberofStalls,"p_no_parking_space"=>$NumberofParkingSpaces,"p_zoning"=>$Zoning,
               "p_building_type"=>$buliding_typ,

               "no_technicians"=>$NumberofTechnicians,"no_manager"=>$NumberofManagers,"no_office_staff"=>$NumberofOfficeStaff,"no_helpers"=>$NumberofHelpers,

               "p_createdate"=>$listingCreatedDate,"agnt_refer_no"=>$InHouseReferenceNumber,"agnt_name"=>$SalesAgentBrokerName,"feature_image"=>$name,"video"=>$Videos,"user_name"=>$username,"images"=>$imagess,"files"=>$files,"status"=>$buttan_status,"created_time"=>now() 
              );

        DB::table('business_listing')->insert($addestablished_fanchise);
    return Redirect::to('/Established_Franchise')->with('success','Data Insert Successfully');

      }else{
        echo 'error';
      }

    }









 function Search(Request $request){
 // $type = $request-> input('searchtype');
 // $sq_feets = $request->input('sq_feet');


 // if ($request-> has('searchtype') && $request-> has('sq_feet')) {
 //  $datasearch = DB::table('business_listing')->where('type','LIKE','%'.$request->has('searchtype').'%')->orwhere ('p_building_sq_ft', 'like', '%'.$request->has('sq_feet').'%')->get();
 //        // return $filter->where('type', $request->input('searchtype'))->get();
 //    }

 if ($request->has('searchtype')) {
      $filter = DB::table('business_listing')->where('type','like','%'.$request->input('searchtype').'%')->get();
        echo $filter;
    }

 if ($request->has('sq_feet')) {
      $feet = DB::table('business_listing')->where('p_building_sq_ft','like','%'.$request->input('sq_feet').'%')->get();
        echo $feet;
    }


// if($request-> has('searchtype')){
// $datasearch = DB::table('business_listing')->where('type','like','%'.$request-> has('searchtype').'%')->get();
//   // echo 'type';
// }

// if($request-> has('sq_feet')){

//   echo 'sq_feet';
// }



 // if ($request-> has('sq_feet')) {
 //  // echo 'sqfeet';
 //  $datasearch = DB::table('business_listing')->WHERE('p_building_sq_ft','like','%'.$request->input('sq_feet').'%')->get();
 //        return $filter->where('type', $request->input('sq_feet'))->get();
 //    }


// if($request-> input('searchtype')){
//   $datasearch = DB::table('business_listing')->WHERE('type','like','%'.$request-> input('searchtype').'%')->get();
// }
// elseif($request->input('sq_feet')){
//    $datasearch = DB::table('business_listing')->WHERE('p_building_sq_ft','like','%'.$request->input('sq_feet').'%')->get();
// }


// $datasearch = DB::table('business_listing')->where('type','LIKE','%'.$type.'%')->orwhere ('p_building_sq_ft', 'like', '%'.$sq_feets.'%')->get();

 // echo $datasearch;
// return View::make('findeo.all_Listing',['search' => $datasearch]);

    }


}    










    

