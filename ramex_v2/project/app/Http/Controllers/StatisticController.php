<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\ExcelImport;
use App\Imports\Excel2Import;
use App\Imports\FramassagesImport;
use App\Imports\FeuillesImport;
use App\Imports\FramasseImport;
use App\Imports\AgereelImport;
use App\Imports\FglobaleImport;

use App\Imports\AgezeroramasseImport;
use App\Imports\Age35ramassesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PassageImport;
use App\Exports\StatisticsExport;
use App\Exports\Statistics35Export;
use App\Exports\AgereelExport;
use App\Exports\AllAges0ramExport;
use App\Exports\AllAges35ramsExport;
use App\Exports\MultiSheetsStatistics0Export;
use App\Exports\MultiSheetsStatistics35Export;
use App\Exports\StatisticsSecond35Export;
use App\Exports\StatisticsSecond0Export;
use App\Exports\FpassageExport;
use App\Exports\FramassagesExport;
use App\Exports\FglobaleExport;

use App\Models\Statistic;
use App\Models\Fichier;
use App\Models\Age;
use App\Models\Zeroramassage;
use App\Models\Tacramassage;

use App\Models\Statistics0ram;
use App\Models\Statistics35ram;

use App\Models\Passage;

use App\Models\Framassage;

use App\Models\Globstatistic;

use Illuminate\Support\Facades\Auth;
//ini_set('max_execution_time', 300);
ini_set('max_execution_time', 600);
//set_time_limit(0);
use PhpOffice\PhpSpreadsheet\IOFactory;

use Maatwebsite\Excel\Classes\LaravelExcelWorksheet;

class StatisticController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
       
    }

    public function zeroramview(){
        if(Auth::user()->profil === "RESPONSABLE ADV"){
            return view('showagezeroram');
        }else{
            return view('error403');
        }
        //return view('showagezeroram');
    }

    public function zeroram2view(){
        if(Auth::user()->profil === "RESPONSABLE ADV"){
            return view('showagezeroram2');
        }else{
            return view('error403');
        }
        //return view('showagezeroram2');
    }

    public function zeroram3view(){
        if(Auth::user()->profil === "RESPONSABLE ADV"){
            return view('showagezeroram3');
        }else{
            return view('error403');
        }
        //return view('showagezeroram3');
    }

    public function tacramview(){
        if(Auth::user()->profil === "RESPONSABLE ADV"){
            return view('showagetacram');
        }else{
            return view('error403');
        }
       // return view('showagetacram');
    }

    public function tacram2view(){
        if(Auth::user()->profil === "RESPONSABLE ADV"){
            return view('showagetacram2');
        }else{
            return view('error403');
        }
       // return view('showagetacram2');
    }

    public function tacram3view(){
        if(Auth::user()->profil === "RESPONSABLE ADV"){
            return view('showagetacram3');
        }else{
            return view('error403');
        }
       // return view('showagetacram3');
    }

    public function passageview(){
        if(Auth::user()->profil === "RESPONSABLE ADV"){
            return view('showpassage');
        }else{
            return view('error403');
        }
        //return view('showpassage');
    }

    public function passage2view(){
        if(Auth::user()->profil === "RESPONSABLE ADV"){
            return view('showpassage2');
        }else{
            return view('error403');
        }
     //   return view('showpassage2');
    }

    public function passage3view(){
        if(Auth::user()->profil === "RESPONSABLE ADV"){
            return view('showpassage3');
        }else{
            return view('error403');
        }
      //  return view('showpassage3');
    }


    public function globstatsview(){
        if(Auth::user()->profil === "RESPONSABLE ADV"){
            return view('showglobstats');
        }else{
            return view('error403');
        }
      //  return view('showpassage3');
    }


    public function globstats2view(){
        if(Auth::user()->profil === "RESPONSABLE ADV"){
            return view('showglobstats2');
        }else{
            return view('error403');
        }
      //  return view('showpassage3');
    }

    public function globstats3view(){
        if(Auth::user()->profil === "RESPONSABLE ADV"){
            return view('showglobstats3');
        }else{
            return view('error403');
        }
      //  return view('showpassage3');
    }

    public function framassageview(){
        return view('exportFeuilleDeRamassage');
    }


    //importer la feuille de ramassage pour l'age zero ram
    public function import(Request $request) 
    {
        $file=$request->file;
      //  $nbr_sec=$request->nbr_sec;

         ////
         $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
         $spreadsheet = $reader->load($file);
         $sheetCount = $spreadsheet->getSheetCount();
         $sheetCount = $sheetCount-1;
         /* dd($sheetCount); */
         /////

        if($file){
           // Excel::import(new FeuillesImport, $file);
           // Excel::import(new ExcelImport, $file);
           Excel::import(new FramasseImport($sheetCount), $file);
          // Excel::import(new FramasseImport($nbr_sec), $file);

        }
        //dd($file);
        return redirect()->route('zeroram2view');
        //return redirect('/')->with('success', 'All good!');
    }

    //importer le fichier de l'age reel pour l'age zero ram
    public function import2(Request $request) 
    {
        $file=$request->file;

         //enregistrer le nom du fichier importé
         $fichier=new Fichier();
         $fichier->nom_fichier=$file->getClientOriginalName();
         $fichier->type_fichier="age_reel";
         $fichier->nom_utilisateur=Auth::user()->name;
         
          
        // dd($file);
        //Excel::import(new Excel2Import, $file);

        $importedfile=Excel::import(new AgereelImport, $file);
        if($importedfile){
            $fichier->save();
        }
        
        return redirect()->route('zeroram2view');
        
        //return redirect('/')->with('success', 'All good!');
    }
 
    //importer feuille de l'age avec zero ramassage pour l'age zero ram
    public function import3(Request $request) 
    {
        $file=$request->file;

        //enregistrer le nom du fichier importé
        $fichier=new Fichier();
        $fichier->nom_fichier=$file->getClientOriginalName();
        $fichier->type_fichier="age_0ram";
        $fichier->nom_utilisateur=Auth::user()->name;
       
          
        // dd($file);
        //Excel::import(new Excel2Import, $file);
        $nom_fichier=$fichier->nom_fichier;
      //  $importedfile=Excel::import(new FeuillesImport($nom_fichier), $file);
        $importedfile=Excel::import(new AgezeroramasseImport($nom_fichier), $file);
        if($importedfile){
            $fichier->save();
        }
        return redirect()->route('zeroram3view');
        
        //return redirect('/')->with('success', 'All good!');
    } 



      //importer la feuille de ramassage pour l'age 3*5 ram
      public function import4(Request $request) 
      {
          $file=$request->file;
        //  $nbr_sec=$request->nbr_sec;

          ////
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
          $spreadsheet = $reader->load($file);
          $sheetCount = $spreadsheet->getSheetCount();
          $sheetCount = $sheetCount-1;
          /* dd($sheetCount); */
          /////
  
          if($file){
             // Excel::import(new FeuillesImport, $file);
             // Excel::import(new ExcelImport, $file);
             Excel::import(new FramasseImport($sheetCount), $file);
           //  Excel::import(new FramasseImport($nbr_sec), $file);
  
          }
          //dd($file);
          return redirect()->route('tacram2view');
          //return redirect('/')->with('success', 'All good!');
      }
  
      //importer le fichier de l'age reel pour l'age 3*5 ram
      public function import5(Request $request) 
      {
          $file=$request->file;
  
           //enregistrer le nom du fichier importé
           $fichier=new Fichier();
           $fichier->nom_fichier=$file->getClientOriginalName();
           $fichier->type_fichier="age_reel";
           $fichier->nom_utilisateur=Auth::user()->name;
         //  $fichier->save();
            
          // dd($file);
          //Excel::import(new Excel2Import, $file);
          $importedfile=Excel::import(new AgereelImport, $file);
          if($importedfile){
            $fichier->save();
        }

          return redirect()->route('tacram2view');
          
          //return redirect('/')->with('success', 'All good!');
      }
   
      //importer feuille de l'age avec 3*5 ramassages pour l'age 3*5 ram
      public function import6(Request $request) 
      {
          $file=$request->file;
  
          //enregistrer le nom du fichier importé
          $fichier=new Fichier();
          $fichier->nom_fichier=$file->getClientOriginalName();
          $fichier->type_fichier="age_tac_ram";
          $fichier->nom_utilisateur=Auth::user()->name;
          //$fichier->save();
            
          // dd($file);
          //Excel::import(new Excel2Import, $file);
          $nom_fichier=$fichier->nom_fichier;
         // $importedfile=Excel::import(new FeuillesImport($nom_fichier), $file);
          $importedfile=Excel::import(new Age35ramassesImport($nom_fichier), $file);
          if($importedfile){
            $fichier->save();
        }
          return redirect()->route('tacram3view');
          
          //return redirect('/')->with('success', 'All good!');
      } 


       //importer la feuille de ramassage pour la feuille passage
    public function import7(Request $request) 
    {
        $file=$request->file;
      //  $nbr_sec=$request->nbr_sec;
      ////
      $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
      $spreadsheet = $reader->load($file);
      $sheetCount = $spreadsheet->getSheetCount();
      $sheetCount = $sheetCount-1;
     /* dd($sheetCount); */
     /////

        if($file){
           Excel::import(new FramasseImport($sheetCount), $file);
          // Excel::import(new FramasseImport($nbr_sec), $file);

        }
        //dd($file);
        return redirect()->route('passage2view');
        //return redirect('/')->with('success', 'All good!');
    }

    //importer la feuille de passage
    public function import8(Request $request) 
    {
        $file=$request->file;
        // dd($file);
        //Excel::import(new Excel2Import, $file);
        if($file){
        $importedfile=Excel::import(new PassageImport, $file);
        }
        
        return redirect()->route('passage3view');
        
        //return redirect('/')->with('success', 'All good!');
    }




    
    //importer la feuille de ramassage pour la feuille globale
    public function import9(Request $request) 
    {
        $file=$request->file;
      //  $nbr_sec=$request->nbr_sec;

         ////
         $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
         $spreadsheet = $reader->load($file);
         $sheetCount = $spreadsheet->getSheetCount();
         $sheetCount = $sheetCount-1;
         /* dd($sheetCount); */
         /////

        if($file){
           // Excel::import(new FeuillesImport, $file);
           // Excel::import(new ExcelImport, $file);
           Excel::import(new FramasseImport($sheetCount), $file);
          // Excel::import(new FramasseImport($nbr_sec), $file);

        }
        //dd($file);
        return redirect()->route('globstats2view');
        //return redirect('/')->with('success', 'All good!');
    }
        //importer feuille globale
        public function import10(Request $request) 
        {
            $file=$request->file; 
            $inc_age_reel= $request->inc_age_reel;

            $statistics=Statistic::where('nom_utilisateur',Auth::user()->name)->orderBy('age_reel', 'ASC')->get();
            foreach($statistics as $statistic){ 
                $statistic->age_reel= $inc_age_reel;
                $statistic->save(); 
            }
          //  $importedfile=Excel::import(new FeuillesImport($nom_fichier), $file);
            $importedfile=Excel::import(new FglobaleImport($inc_age_reel), $file);
            // if($importedfile){
            //     $fichier->save();
            // }
            return redirect()->route('globstats3view');
            
            //return redirect('/')->with('success', 'All good!');
        } 
 
   
  


    public function showStatistics(){
        return view("showStatistics");
    }

    public function delete(){

        Statistic::where('nom_utilisateur',Auth::user()->name)->delete();
        Fichier::where('nom_utilisateur',Auth::user()->name)->delete();
        Age::where('nom_utilisateur',Auth::user()->name)->delete();
        Zeroramassage::where('nom_utilisateur',Auth::user()->name)->delete();
        Tacramassage::where('nom_utilisateur',Auth::user()->name)->delete();
        Statistics0ram::where('nom_utilisateur',Auth::user()->name)->delete();
        Statistics35ram::where('nom_utilisateur',Auth::user()->name)->delete();
        Passage::where('nom_utilisateur',Auth::user()->name)->delete();
        Globstatistic::where('nom_utilisateur',Auth::user()->name)->delete();

     /*   Statistic::where('id', 'like', '%%')->delete();
        Fichier::where('id', 'like', '%%')->delete();
        Age::where('id', 'like', '%%')->delete();
        Zeroramassage::where('id', 'like', '%%')->delete();
        Tacramassage::where('id', 'like', '%%')->delete();*/
      //  return redirect()->route('zeroramview');
    }

    //exporter la table des clients avec 0 ramassage
    public function export(Request $request) 
    {
        //donnees pour feuille 0 ram
        $counter=Statistic::where('nom_utilisateur',Auth::user()->name)->where('somme',0)->count();
        //donnees pour le diagramme
        $counter2=Statistics0ram::where('nom_utilisateur',Auth::user()->name)->count();
        $nbr_clients=Statistics0ram::where('nom_utilisateur',Auth::user()->name)->sum('nbr_clients');
        $pourcentage=Statistics0ram::where('nom_utilisateur',Auth::user()->name)->sum('pourcentage');
        if($pourcentage>99.75){
            $pourcentage = 100;
        }

       // $excel=new CommandesExport;
        //dd($request);
        $filename=$request->nom_fichier_excel;
        //return Excel::download(new StatisticsExport($counter), $filename.'.xlsx');
        return Excel::download(new MultiSheetsStatistics0Export($counter,$counter2,$nbr_clients,$pourcentage,$filename), $filename.'.xlsx');

    }
  /*
    //importer la feuille de ramassage
    public function import3(Request $request) 
    {
        $file=$request->file;


        if($file){
            Excel::import(new FramassagesImport, $file);
        }
        //dd($file);
        return redirect()->route('feuillederamassage');
        //return redirect('/')->with('success', 'All good!');
    } */

    //Realiser une feuille de ramassage
    public function generate_fram(){
        $lines=Framassage::all();
        $datas=Statistic::all();

        //boucle pour incrementer l'age avec 0 ramassage
        foreach($lines as $line){
//

                 foreach($datas as $data){

                    if($data->client == $line->Client){

                     // $cl=Statistic::where('client',$data->client)->get();
                      $data->age_reel=$data->age_reel + 1;
                      $data->save();
                 //     Statistic::where('client',$data->client)
                  //    ->update(['age_reel' =>$age1]);

                      if($line->Somme == 0){
                        $data->age_avec_0ramassage=$data->age_avec_0ramassage + 1;
                        $data->save();
                         //   $cl2=Statistic::where('client',$data->client)->get();
                         //   $cl2->age_avec_0ramassage= $cl2->age_avec_0ramassage+1;
                          //  Statistic::where('client',$data->client)
                          //  ->update(['age_avec_0ramassage' =>$age2]);
                        }
                     }
                 }//
            
        }

        //boucle pour modifier la table framassages

        $frams=Framassage::all();
        $stats=Statistic::all();

        foreach($frams as $fram){
            if($fram->Somme == 0){
                foreach($stats as $stat){
                    if($fram->Client == $stat->client){
                        if($stat->age_avec_0ramassage >= ($stat->age_reel * 2)/3){
                            $fram->delete();
                        }
    
                    }
                    
                }
            }
        }

        //boucle pour vider la nouvelle feuille
        $rows=Framassage::all();
        foreach($rows as $row){
            Framassage::where('Client',$row->Client)
                            ->update(['Lundi' =>0,'Mardi' =>0,'Mercredi' =>0,'Jeudi' =>0,'Vendredi' =>0,'Somme' =>0]);
        } 
    }

    //exporter les clients entre 3 et 5 ramassages
    public function export2(Request $request) 
    {
        //donnees pour feuille 3*5 ram
        $counter=Statistic::where('nom_utilisateur',Auth::user()->name)->whereBetween( 'somme',[ 3, 5])->count();

        //donnees pour diagramme
        $counter2=Statistics35ram::where('nom_utilisateur',Auth::user()->name)->count();
        $nbr_clients=Statistics35ram::where('nom_utilisateur',Auth::user()->name)->sum('nbr_clients');
        $pourcentage=Statistics35ram::where('nom_utilisateur',Auth::user()->name)->sum('pourcentage');
        if($pourcentage>99.75){
            $pourcentage = 100;
        }
      
        $filename=$request->nom_fichier_excel;
        //return Excel::download(new Statistics35Export($counter,$filename), $filename.'.xlsx');
        return Excel::download(new MultiSheetsStatistics35Export($counter,$counter2,$nbr_clients,$pourcentage,$filename), $filename.'.xlsx');
       
    }

     //exporter la feuille passage
     public function export3(Request $request) 
     {
        $counter=Passage::where('nom_utilisateur',Auth::user()->name)->count();
        $counter2=Passage::where('nom_utilisateur',Auth::user()->name)->where('cat_0',1)->count();
        $counter3=Passage::where('nom_utilisateur',Auth::user()->name)->where('cat_12',1)->count();
        $counter4=Passage::where('nom_utilisateur',Auth::user()->name)->where('cat_35',1)->count();
         // $excel=new CommandesExport;
          //dd($request);
          $filename=$request->nom_fichier_excel;
          $col1=$request->nom_colonne_1;
          $col2=$request->nom_colonne_2;
          $col3=$request->nom_colonne_3;
          $col4=$request->nom_colonne_4;
          $col5=$request->nom_colonne_5;
          return Excel::download(new FpassageExport($counter,$counter2,$counter3,$counter4,$col1,$col2,$col3,$col4,$col5), $filename.'.xlsx');
        // $excel=new CommandesExport;
         //dd($request);
         //return Excel::download(new FramassagesExport, 'feuille_de_ramassage.xlsx');
     }

    //exporter le diagramme des statistics de l'age avec 3*5 ramasses
    public function export4(Request $request) 
    {
        $counter=Statistics35ram::where('nom_utilisateur',Auth::user()->name)->count();
        $nbr_clients=Statistics35ram::where('nom_utilisateur',Auth::user()->name)->sum('nbr_clients');
        $pourcentage=Statistics35ram::where('nom_utilisateur',Auth::user()->name)->sum('pourcentage');
        if($pourcentage>99.75){
            $pourcentage = 100;
        }
            
          $filename=$request->nom_fichier_excel;
          return Excel::download(new StatisticsSecond35Export($counter, $nbr_clients,$pourcentage,$filename),$filename.'.xlsx');
     }


     //exporter le diagramme des statistics de l'age avec 0 ramasse
    public function export5(Request $request) 
    {
        $counter=Statistics0ram::where('nom_utilisateur',Auth::user()->name)->count();
        $nbr_clients=Statistics0ram::where('nom_utilisateur',Auth::user()->name)->sum('nbr_clients');
        $pourcentage=Statistics0ram::where('nom_utilisateur',Auth::user()->name)->sum('pourcentage');
        if($pourcentage>99.75){
            $pourcentage = 100;
        }
            
          $filename=$request->nom_fichier_excel;
          return Excel::download(new StatisticsSecond0Export($counter, $nbr_clients,$pourcentage,$filename),$filename.'.xlsx');
     }


       //exporter la feuille age reel
    public function export6(Request $request) 
    {
        $counter=Statistic::where('nom_utilisateur',Auth::user()->name)->count();
       // $excel=new CommandesExport;
        //dd($request);
        $filename=$request->nom_fichier_excel;
        return Excel::download(new AgereelExport($counter), $filename.'.xlsx');
    }
   

     //exporter la table des clients avec 0 ramassage
     public function export7(Request $request) 
     {
         $counter=Statistic::where('nom_utilisateur',Auth::user()->name)->count();
        // $excel=new CommandesExport;
         //dd($request);
         $filename=$request->nom_fichier_excel;
         return Excel::download(new AllAges0ramExport($counter), $filename.'.xlsx');
     }

      //exporter la table des clients avec 3*5 ramassages
      public function export8(Request $request) 
      {
          $counter=Statistic::where('nom_utilisateur',Auth::user()->name)->count();
         // $excel=new CommandesExport;
          //dd($request);
          $filename=$request->nom_fichier_excel;
          return Excel::download(new AllAges35ramsExport($counter), $filename.'.xlsx');
      }

         //exporter la feuille globale
    public function export9(Request $request) 
    {
        $counter=Statistic::where('nom_utilisateur',Auth::user()->name)->count();
       // $excel=new CommandesExport;
        //dd($request);
        $filename=$request->nom_fichier_excel;
        return Excel::download(new FglobaleExport($counter), $filename.'.xlsx');
    }

     /* feuille 0ram */
     //Modifier l'age reel d'un client
     public function updateAgeReel(Request $request){
         $client=Statistic::find($request->id_client);
         $client->age_reel=$request->age_client;
         $client->save();

         $statistics=Statistic::where('somme',0)->where('nom_utilisateur',Auth::user()->name)->orderBy('age_avec_0ramassage', 'ASC')->get();

        return $statistics;
     }

     //Modifier l'age avec 0ram d'un client
     public function updateAge0Ram(Request $request){
        $client=Statistic::find($request->id_client);
        $client->age_avec_0ramassage=$request->age_client;
        $client->nom_fichier_age_0ram="Manuellement";
        $client->save();

        $statistics=Statistic::where('somme',0)->where('nom_utilisateur',Auth::user()->name)->orderBy('age_avec_0ramassage', 'ASC')->get();

       return $statistics;
    }

    /* feuille 3*5ram */
     //Modifier l'age reel d'un client
     public function updateAgeReel2(Request $request){
        $client=Statistic::find($request->id_client);
        $client->age_reel=$request->age_client;
        $client->save();

        $statistics=Statistic::whereBetween( 'somme',[ 3, 5])->where('nom_utilisateur',Auth::user()->name)->orderBy('age_avec_3_5ramassage', 'ASC')->get();
        
        return $statistics;
    }

    //Modifier l'age avec 3*5 ramS d'un client
    public function updateAge35Ram(Request $request){
       $client=Statistic::find($request->id_client);
       $client->age_avec_3_5ramassage=$request->age_client;
       $client->nom_fichier_age_3_5ram="Manuellement";
       $client->save();

       $statistics=Statistic::whereBetween( 'somme',[ 3, 5])->where('nom_utilisateur',Auth::user()->name)->orderBy('age_avec_3_5ramassage', 'ASC')->get();
        
       return $statistics;
   }

}
