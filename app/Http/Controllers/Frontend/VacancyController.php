<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Atom\Vacancies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VacancyController extends Controller
{

    protected $vacancy  ;

    public function send(Request  $request)
    {
       $validated = (object) $this->validate($request,[
              'name' => 'required|string',
              'lastname' => 'required|string',
              'father_name' => 'required|string',
              'gender' => 'required|string',
              'relation' => 'nullable|string',
              'children' => 'nullable|string',
              'place_of_birth' => 'nullable|string',
              'citizenship' => 'nullable|string',
              'reg_address' => 'required|string',
              'address' => 'nullable|string',
              'telephone' => 'nullable|string',
              'phone' => 'required|string',
              'email' => 'required|email',
              'work_mode' => 'required|string',
              'work_salary' => 'required|string',
              'work_name' => 'sometimes|required|string',
              'army' => 'required|string',
              'health' => 'required|string',
              'crime' => 'required|string',
              'about' => 'nullable|string',
              'image' => 'nullable|image|max:4096|mimes:jpg,bmp,png,jpeg,svg',
              'file' => 'nullable|file|max:4096|mimes:doc,docx,xls,xlsx,pdf,ppt,pptx',
            //--------ARRAYS VALIDATION--------//
            'birthday' => 'required|min:3',
            'birthday.*' => 'required',
            'education' => 'nullable|array',
            'education.*.*' => 'nullable|string',
            'work_experience' => 'nullable|array',
            'work_experience.*.*' => 'nullable|string',
            'drive_license' => 'nullable|array',
            'drive_license.*' => 'nullable',
            'foreignLanguage' => 'nullable|array',
            'foreignLanguage.*.*' => 'nullable|string',
            'computerKnowledge' => 'nullable|array',
            'computerKnowledge.*.*' => 'nullable|string',


        ]);

        $validated->education = $this->education($request->input('education')) ;
        $validated->work_experience = $this->workExperience($request->input('work_experience')) ;
        $validated->drive_license = $this->driverLicense($request->input('drive_license')) ;
        $validated->foreignLanguage = $this->foreignLanguage($request->input('foreignLanguage')) ;
        $validated->computerKnowledge = $this->computerKnowledge($request->input('computerKnowledge')) ;
        $validated->birthday = $this->birthday($request->input('birthday')) ;

        $files = $request->allFiles() ;



        $this->vacancy = $request->vacancy ?? null ;

        if(!is_null($this->vacancy))  $this->vacancy = Vacancies::findOrFail($this->vacancy) ;




        Mail::send('emails.vacancy',compact('validated'),function ($message) use ($files)  {
            $a = $message->to( settings('cooperation-e-apply') )
                ->subject('Vakansiya' . ( is_null($this->vacancy) ? '' : ' - ' . $this->vacancy->title . ' üçün')  . ' müraciət'  ) ;

            foreach ($files as $file)
            {
                $a->attach( $file->getRealPath() ,[
                    'as' => $file->getClientOriginalName(),
                    'mime' => $file->getMimeType()
                ] ) ;
            }

        });

        return redirect()->back()->withSuccess("ok");
    }

    /**
     * PARSE Education
     *
     * @param $educations
     * @return string
     */
    public function education($educations)
    {
        $fake = '' ;
        $result = '<ul style="padding:0 0 0 16px">';

        for ($i = 0 ; $i < count($educations['name']) ; $i++)
        {
            if (is_null($educations['name'][$i] ))  continue;

           $fake = '<li style="margin-bottom:6px"> ' ;
           $fake .=  ( $educations['name'][$i]  ?? '' )  . ' –– '  ;
           $fake .=  ( $educations['faculty'][$i]  ?? '' )  . ' / '  ;
           $fake .=  ( $educations['start_day'][$i]  ?? '' )  . '-'  ;
           $fake .=  ( $educations['start_month'][$i]  ?? '' )  . '-'  ;
           $fake .=  ( $educations['start_year'][$i]  ?? '' )  . ' / '  ;
           $fake .=  ( $educations['end_day'][$i]  ?? '' )  . '-'  ;
           $fake .=  ( $educations['end_month'][$i]  ?? '' )  . '-'  ;
           $fake .=  ( $educations['end_year'][$i]  ?? '' )  . ' / '  ;
           $fake .=   $educations['note'][$i]  ?? ''   ;
           $fake .= ' </li>' ;

           $result .= $fake ;

        }

        $result .='</ul>' ;

        return  is_null($educations['name'][0]) ? null : $result ;
    }

    /**
     * PARSE Work Experience
     *
     * @param $educations
     * @return string
     */
    public function workExperience($work)
    {
        $fake = '' ;
        $result = '<ul style="padding:0 0 0 16px">';

        for ($i = 0 ; $i < count($work['name']) ; $i++)
        {
            if (is_null($work['name'][$i] ))  continue;

            $fake = '<li style="margin-bottom:6px"> ' ;
            $fake .=  ( $work['name'][$i]  ?? '' )  . ' –– '  ;
            $fake .=  ( $work['position'][$i]  ?? '' )  . ' / '  ;
            $fake .=  ( $work['salary'][$i]  ?? '' )  . ' / '  ;
            $fake .=  ( $work['start_day'][$i]  ?? '' )  . '-'  ;
            $fake .=  ( $work['start_month'][$i]  ?? '' )  . '-'  ;
            $fake .=  ( $work['start_year'][$i]  ?? '' )  . ' / '  ;
            $fake .=  ( $work['end_day'][$i]  ?? '' )  . '-'  ;
            $fake .=  ( $work['end_month'][$i]  ?? '' )  . '-'  ;
            $fake .=  ( $work['end_year'][$i]  ?? '' )  . ' / '  ;
            $fake .=   $work['reason'][$i]  ?? ''   ;
            $fake .= ' </li>' ;

            $result .= $fake ;

        }

        $result .='</ul>' ;


        return is_null($work['name'][0]) ? null : $result ;
    }

    /**
     * PARSE Driver License
     *
     * @param $educations
     * @return string
     */
    public function driverLicense($driver)
    {

        if (is_null($driver['have'])) return null ;

        return $driver['type'] . ' --- ' . $driver['level'] ;
    }

    /**
     * PARSE Foreign Languages
     *
     * @param $educations
     * @return string
     */
    public function foreignLanguage($lang)
    {
        $fake = '' ;
        $result = '<ul style="padding:0 0 0 16px">';

        for ($i = 0 ; $i < count($lang['language']) ; $i++)
        {
            if (is_null($lang['language'][$i] ))  continue;

            $fake = '<li style="margin-bottom:6px"> ' ;
            $fake .=  ( $lang['language'][$i]  ?? '' )  . ' –– '  ;
            $fake .=  ( $lang['level'][$i]  ?? '' )   ;
            $fake .= ' </li>' ;

            $result .= $fake ;

        }

        $result .='</ul>' ;

        return is_null($lang['language'][0]) ? null : $result ;
    }

    /**
     * PARSE Computer Knowledge
     *
     * @param $educations
     * @return string
     */
    public function computerKnowledge($comp)
    {
        $fake = '' ;
        $result = '<ul style="padding:0 0 0 16px">';

        for ($i = 0 ; $i < count($comp['program']) ; $i++)
        {
            if (is_null($comp['program'][$i] ))  continue;

            $fake = '<li style="margin-bottom:6px"> ' ;
            $fake .=  ( $comp['program'][$i]  ?? '' )  . ' –– '  ;
            $fake .=  ( $comp['level'][$i]  ?? '' )   ;
            $fake .= ' </li>' ;

            $result .= $fake ;

        }

        $result .='</ul>' ;

        return is_null($comp['program'][0]) ? null : $result ;
    }

    /**
     * PARSE Birthday
     *
     * @param $educations
     * @return string
     */
    public function birthday($date)
    {
        return $date['day'] . '-' . $date['month']  . '-' . $date['year']  ;
    }
}
