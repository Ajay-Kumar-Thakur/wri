<?php
namespace App\Http\Controllers;

use App\Models\University;
use App\Models\Location; 
use App\Models\Course;
use App\Models\Intake;
use App\Models\Scholarship;
use App\Models\Amount;
use App\Models\Ietls;
use App\Models\Pte;
use App\Models\PgIetel;
use App\Models\PgPte;
use App\Models\Processing;
use App\Models\Initiated;
use App\Models\Bcvalue;
use App\Models\Bvalue;
use App\Models\Handled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all universities
    $universities = University::all();

    $locations = Location::all();

    $courses = Course::all();

    $intakes = Intake::all();

    $scholarships = Scholarship::all();

    $amounts = Amount::all();

    $ietls = Ietls::all();

    $ptes = Pte::all();

    $pg_ietels = PgIetel::all();

    $pg_ptes = PgPte::all();

    $processings = Processing::all();

    $initiateds = Initiated::all();

    $bcvalues = Bcvalue::all();

    $bvalues = Bvalue::all();

    $handleds = Handled::all();

        // Get the authenticated user
        $user = Auth::user();

        // Set flags for showing dropdowns based on user email or role
        $showInterview = false;
        $showNoc = false;
        $showAdmin = false;
        $showDataEntry = false;
        $showSuperview = false;
        $showTeam = false;
        $showGaurav = false;
        $showRoshan = false;
        $showRam = false;
        $showSamiksha = false;
        $showBikalp = false;

        if ($user) {
            if ($user->email == 'interviews123456s@example.com') { // Check if user is for Interview
                $showInterview = true;
            } elseif ($user->email == 'nocs123456s@example.com') { // Check if user is for NOC
                $showNoc = true;
            }
            elseif ($user->email == 'admins123456s@example.com'){
                $showAdmin = true;
            }
            else if($user->email == 'dataentrys123456s@example.com'){
                $showDataEntry = true; 
            }
            else if($user->email == 'superadmins123456s@gmail.com'){
                $showSuperview = true;
            }
            else if($user->email == 'teams123456s@example.com'){
                $showTeam = true;
            }
            else if($user->email == 'Gauravss1456@example.com'){
                $showGaurav = true;
            }
            else if($user->email == 'Roshans456@example.com'){
                $showRoshan = true;
            }
            else if($user->email == 'Ram46@example.com'){
                $showRam = true;
            }
            else if($user->email == 'samiksha456@example.com'){
                $showSamiksha = true;
            }
            else if($user->email == 'Bikalp456@example.com'){
                $showBikalp = true;
            }
        }

        // Return the view with flags to control dropdown visibility
        return view('dashboard', compact('showInterview', 'showNoc', 'showAdmin', 'showDataEntry', 'showSuperview', 'showTeam', 'showGaurav', 'showRoshan', 'showRam', 'showSamiksha', 'showBikalp', 'universities', 'locations', 'courses', 'intakes', 'scholarships', 'amounts', 'ietls', 'ptes', 'pg_ietels', 'pg_ptes', 'processings', 'initiateds', 'bcvalues', 'bvalues', 'handleds'));
    }

    
}
