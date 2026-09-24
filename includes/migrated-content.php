<?php
declare(strict_types=1);

/**
 * Original editorial sections adapted from topic coverage found in the legacy
 * education-portal mirror. No third-party branded graphics, logos, screenshots
 * or copied promotional copy are used here.
 */
function migratedStreamSections(string $slug): array
{
    $sections = [
        'engineering' => [
            [
                'B.Tech planning in Jaipur',
                'Engineering applicants should start with the branch, not the college name. Compare Computer Science, Electronics, Electrical, Mechanical, Civil and other available branches against your interests, mathematics comfort, lab requirements and likely career direction. A college that is strong for one branch may not offer the same depth in another, so verify the exact department, curriculum and facilities before applying.'
            ],
            [
                'What to verify before applying',
                'Check the current admission route, required Class 12 subjects, counselling or entrance requirements, programme approval, intake and the exact campus where the course is delivered. Ask for a current fee sheet covering tuition, examination, laboratory, hostel, transport and refundable deposits. Save the official prospectus and payment policy before submitting a non-refundable amount.'
            ],
            [
                'Branch selection should match your work preference',
                'Students interested in software and digital products may prefer computing-heavy branches, while those who enjoy machines, structures, electronics or physical systems may be better suited to core engineering disciplines. Do not choose a branch only because of a recent placement headline. Look at syllabus, practical work, internships and the type of roles graduates actually pursue.'
            ],
        ],
        'arts' => [
            [
                'Choosing a BA combination in Jaipur',
                'A BA can lead to very different academic and career paths depending on the subject combination. Compare options such as English, Economics, Political Science, Psychology, Sociology, History and other humanities or social-science subjects offered by the institution. Verify whether the college follows a fixed combination, elective system or multidisciplinary structure.'
            ],
            [
                'Questions to ask the department',
                'Check subject availability across all semesters, language requirements, attendance rules, internal assessment pattern, fieldwork or project components and postgraduate progression. If you are considering civil services, media, research, teaching, policy or social-sector careers, map your subject choices to the skills and higher-study route you may need later.'
            ],
            [
                'Budget and commute matter for a three-year degree',
                'For a regular undergraduate programme, daily travel time and total yearly cost can influence the student experience as much as the headline tuition fee. Compare commute, library access, timetable, student societies, academic support and any additional charges before finalising a college.'
            ],
        ],
        'architecture' => [
            [
                'B.Arch is a professional programme',
                'Architecture combines design studios, technical subjects, drawing, structures, building science, history and repeated project reviews. Students should verify that the programme is currently recognised for the relevant academic year and understand the institution’s studio culture, workshop access, software facilities and site-visit exposure.'
            ],
            [
                'Admission and aptitude requirements',
                'Architecture admission can involve specific Class 12 subject requirements and an aptitude or entrance route depending on the institution and counselling system. Because rules can change, rely on the current official admission notice and the applicable professional or counselling authority rather than an old listing page.'
            ],
            [
                'Look beyond campus appearance',
                'A visually impressive campus does not automatically mean a strong architecture programme. Ask to see studios, model-making facilities, computer labs, recent student work, jury process, internship support and faculty profiles. Also budget for printing, model materials, software, field visits and a laptop capable of design work.'
            ],
        ],
        'science' => [
            [
                'B.Sc choices depend on the subject combination',
                'Science colleges may offer combinations or honours-style programmes across Physics, Chemistry, Mathematics, Biology, Biotechnology, Geology and related disciplines. Before applying, confirm the exact subject mix, laboratory hours and whether the programme matches the eligibility requirements of the postgraduate or career route you may want later.'
            ],
            [
                'Laboratory access is a key comparison point',
                'For practical subjects, inspect laboratories, equipment availability, batch size, safety practices and how often students perform experiments themselves. Ask whether projects, fieldwork, internships or research exposure are part of the curriculum instead of assuming every B.Sc programme offers the same practical experience.'
            ],
            [
                'Plan the next step early',
                'Many science careers require postgraduate study, professional training or competitive examinations. Compare a college not only on first-year fees but also on academic depth, mentoring, project opportunities and preparation for M.Sc, research, analytics, teaching, healthcare-support or industry pathways.'
            ],
        ],
        'agriculture' => [
            [
                'Agriculture programmes should be checked course by course',
                'Agriculture education may include crop science, soil science, horticulture, plant protection, agricultural economics, extension and practical field training. Verify the exact degree title, affiliation or recognition, practical farm exposure and the institution’s current eligibility conditions before applying.'
            ],
            [
                'Field learning matters',
                'A useful agriculture programme needs more than classroom teaching. Ask about farm or field facilities, laboratories, seasonal practical work, industry or extension exposure and how the institution handles internships or rural-work components. The quality of practical exposure can vary significantly between campuses.'
            ],
            [
                'Career planning is broader than one job title',
                'Graduates may explore agribusiness, farm management, input companies, banking, government examinations, food and supply chains, research or postgraduate study. Compare the curriculum with the direction you are considering and verify any placement or internship claim with recent, programme-specific evidence.'
            ],
        ],
    ];

    return $sections[$slug] ?? [];
}
