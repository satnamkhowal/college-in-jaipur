<?php
declare(strict_types=1);

require_once __DIR__ . '/functions.php';

function blogSlug(string $text): string
{
    $text = strtolower(trim($text));
    $text = preg_replace('/[^a-z0-9]+/', '-', $text) ?? '';
    return trim($text, '-');
}

function allBlogPosts(): array
{
    static $posts;
    if ($posts !== null) return $posts;
    $posts = [];
    $colleges = fallbackColleges();
    $collegeAngles = [
        ['admission-guide','Admission Guide','admission process, eligibility aur documents'],
        ['courses-guide','Courses Guide','popular courses aur programme selection'],
        ['fees-planning','Fees Planning Guide','fees verify karne aur budget planning'],
        ['placement-guide','Placement Guide','placement data ko practically evaluate karna'],
        ['campus-life','Campus Life Guide','campus, clubs aur student experience'],
        ['hostel-guide','Hostel Guide','hostel, PG aur daily living options'],
        ['scholarship-guide','Scholarship Guide','scholarship sources aur application planning'],
        ['eligibility-guide','Eligibility Guide','eligibility, entrance exam aur merit criteria'],
        ['documents-checklist','Documents Checklist','admission documents aur verification'],
        ['review-guide','Student Review Guide','student reviews ko smartly analyse karna'],
        ['how-to-choose','How to Choose','college selection ke important factors'],
        ['career-options','Career Options','course ke baad career planning'],
        ['commute-guide','Jaipur Commute Guide','location, travel time aur transport planning'],
        ['comparison-checklist','Comparison Checklist','shortlisting aur comparison framework'],
        ['first-year-guide','First Year Guide','new students ke liye practical preparation'],
        ['application-tips','Application Tips','application form aur deadline management'],
    ];
    foreach ($colleges as $college) {
        foreach ($collegeAngles as [$suffix,$label,$focus]) {
            $title = $college['name'] . ' ' . $label . ' 2026';
            $posts[] = ['slug'=>blogSlug($college['slug'].'-'.$suffix.'-2026'),'title'=>$title,'description'=>$college['short_name'].' Jaipur ke liye practical Hinglish guide: '.$focus.'. Apply karne se pehle current details official source se verify karein.','category'=>'College Guides','kind'=>'college','subject'=>$college['name'],'area'=>$college['area'],'focus'=>$focus,'college'=>$college];
        }
    }

    $courses = [
        ['B.Tech','Engineering'],['BCA','Computer Applications'],['MCA','Computer Applications'],['BBA','Management'],['MBA','Management'],['B.Com','Commerce'],['M.Com','Commerce'],['B.Sc','Science'],['M.Sc','Science'],['BA','Arts & Humanities'],['MA','Arts & Humanities'],['LLB','Law'],['B.Des','Design'],['B.Pharm','Pharmacy'],['B.Ed','Education'],['B.Arch','Architecture']
    ];
    $courseAngles = [
        ['best-colleges','Best Colleges Shortlist','college shortlist'],['admission','Admission Guide','admission process'],['eligibility','Eligibility Guide','eligibility criteria'],['fees','Fees & Budget Guide','education budget'],['entrance-exams','Entrance Exam Guide','entrance exam planning'],['career','Career Scope','career options'],['salary','Salary & Skills Guide','skills and salary research'],['syllabus','Syllabus Guide','syllabus evaluation'],['specializations','Specialization Guide','specialization selection'],['government-colleges','Government College Guide','public college options'],['private-colleges','Private College Guide','private college options'],['without-entrance','Admission Without Entrance Exam','admission route verification'],['documents','Documents Checklist','document preparation'],['scholarships','Scholarship Guide','scholarship research'],['placements','Placement Evaluation Guide','placement comparison'],['after-12th','After 12th Guide','post-school planning']
    ];
    foreach ($courses as [$course,$stream]) {
        foreach ($courseAngles as [$suffix,$label,$focus]) {
            $title = $course . ' in Jaipur: ' . $label . ' 2026';
            $posts[] = ['slug'=>blogSlug($course.'-in-jaipur-'.$suffix.'-2026'),'title'=>$title,'description'=>$course.' in Jaipur ke liye Hinglish guide covering '.$focus.', college comparison aur admission verification steps.','category'=>'Course Guides','kind'=>'course','subject'=>$course,'stream'=>$stream,'focus'=>$focus];
        }
    }

    $areas = ['Mansarovar','Jagatpura','Malviya Nagar','Sitapura','JLN Marg','Vidyadhar Nagar','Vaishali Nagar','Tonk Road','Ajmer Road','Kukas','Sanganer','Pratap Nagar','C-Scheme','Raja Park','Bani Park','Shyam Nagar','Gopalpura','Kalwar Road','Achrol','Chaksu'];
    $areaAngles = [
        ['colleges','Colleges Guide','college discovery'],['engineering-colleges','Engineering Colleges','engineering options'],['management-colleges','Management Colleges','management options'],['bca-colleges','BCA Colleges','computer application options'],['girls-colleges','Girls Colleges','women-focused options'],['budget-colleges','Budget Planning for Colleges','affordable planning'],['hostel-pg','Hostel & PG Guide','student accommodation'],['transport','Student Transport Guide','daily commute'],['student-life','Student Life Guide','local student experience'],['admission-help','College Admission Help','admission planning']
    ];
    foreach ($areas as $area) {
        foreach ($areaAngles as [$suffix,$label,$focus]) {
            $posts[] = ['slug'=>blogSlug($label.'-in-'.$area.'-jaipur-2026'),'title'=>$label.' in '.$area.', Jaipur – 2026 Guide','description'=>$area.' Jaipur mein '.$focus.' ke liye practical Hinglish checklist, comparison points aur verification advice.','category'=>'Area Guides','kind'=>'area','subject'=>$area,'focus'=>$focus];
        }
    }

    $pairs = [];
    for ($i=0; $i<count($colleges); $i++) {
        for ($j=$i+1; $j<count($colleges); $j++) $pairs[] = [$colleges[$i],$colleges[$j]];
    }
    foreach (array_slice($pairs, 0, 160) as [$a,$b]) {
        $posts[] = ['slug'=>blogSlug($a['short_name'].'-vs-'.$b['short_name'].'-jaipur-comparison-2026'),'title'=>$a['short_name'].' vs '.$b['short_name'].' – Jaipur College Comparison 2026','description'=>$a['name'].' aur '.$b['name'].' ko courses, location, budget, campus aur verified admission factors par compare karne ki Hinglish guide.','category'=>'Comparisons','kind'=>'comparison','subject'=>$a['short_name'].' vs '.$b['short_name'],'focus'=>'college comparison','collegeA'=>$a,'collegeB'=>$b];
    }
    return array_slice($posts, 0, 1000);
}

function getBlogPost(string $slug): ?array
{
    foreach (allBlogPosts() as $post) if ($post['slug'] === $slug) return $post;
    return null;
}

function blogArticleSections(array $post): array
{
    $subject = $post['subject'];
    $focus = $post['focus'];
    $intro = "$subject ke baare mein online information dekhte waqt students ko ek common problem hoti hai: details bahut milti hain, lekin decision clear nahi hota. Yeh guide $focus ko simple Hinglish mein samjhati hai, taaki aap marketing claims ke bajay apni eligibility, budget, location aur career goal ke basis par shortlist bana sakein. 2026 admission cycle ke rules, dates, fees aur seat availability change ho sakte hain, isliye final action se pehle official website aur admission office se written confirmation zaroor lein.";
    $sections = [
        ['Quick overview', $intro],
        ['Sabse pehle apna goal clear karein', "College ya course choose karne se pehle teen cheezein likhein: aap kis field mein career banana chahte hain, total yearly budget kitna hai, aur Jaipur mein daily travel ya hostel preference kya hai. Sirf popular naam dekhkar form bharna practical strategy nahi hai. Apne required course, preferred specialization, academic score aur entrance-exam status ki short profile banayein. Isi profile ko har option par apply karne se comparison objective rahega."],
        ['Eligibility aur admission process verify kaise karein', "Eligibility ko केवल percentage tak limit mat samjhiye. Required subjects, recognised board or university, entrance test, counselling route, category documents aur gap-year rules bhi check karein. Official admission notification ka PDF save karein aur application deadline calendar mein note karein. Kisi counsellor ya third-party listing ki information useful starting point ho sakti hai, lekin final authority institution ka current prospectus aur relevant regulator hota hai."],
        ['Fees ko sahi tarah compare karein', "Tuition fee total cost ka sirf ek part hota hai. Registration, examination, laboratory, library, transport, hostel, mess, security deposit aur annual activity charges alag ho sakte hain. College se semester-wise fee breakup maangein aur refundable versus non-refundable charges clear karein. Scholarship ko guaranteed discount na maanein; eligibility, renewal condition, deadline aur disbursement process alag se verify karein."],
        ['Campus visit checklist', "Possible ho to working day par campus visit karein. Department classrooms, labs, library, transport desk, hostel, canteen aur student-support office dekhein. Current students se timetable, faculty availability, practical sessions, internship assistance aur attendance policy par neutral questions poochhein. Ek impressive building se academic fit prove nahi hota; facilities ko apne course ke actual requirements se match karein."],
        ['Placement claims ko evaluate karna', "Highest package ko average outcome samajhna galat ho sakta hai. Programme-specific placement report, eligible students, placed students, median or average compensation, recruiter roles aur internship conversion data poochhein. Yeh bhi dekhein ki jobs core domain ki hain ya general sales/support roles. Placement cell ka support valuable hai, lekin skills, projects, communication aur consistent preparation student ko khud build karni hoti hai."],
        ['Shortlist banane ka practical framework', "Har option ko five-point score dein: academic fit, verified affordability, commute or accommodation, learning environment aur career support. Must-have aur good-to-have features alag rakhein. Ideal shortlist mein aspirational, realistic aur safe options hone chahiye. Application dates overlap kar sakti hain, isliye documents scan karke organised folder mein rakhein aur fee payment receipts ka backup maintain karein."],
        ['Red flags jo ignore nahi karne chahiye', "Guaranteed admission, guaranteed job, cash-only urgent payment, unverifiable approval, blank receipt ya written fee structure dene se refusal clear warning signs hain. Original documents bina acknowledgement ke submit na karein. Refund and cancellation policy ko payment se pehle padhein. Phone conversation ke important points ko email ya official message mein confirm karwana future dispute se bachata hai."],
        ['Final decision se pehle', "Do ya teen strong options compare karke family ke saath total cost aur daily routine discuss karein. Course curriculum, recognition, examination system, internship exposure aur alumni outcomes ko weight dein. $subject ek suitable option ho sakta hai ya nahi, yeh aapki personal profile aur current verified information par depend karega. Application submit karne se pehle spelling, marks, category, uploaded documents aur contact details double-check karein."],
    ];
    return $sections;
}
