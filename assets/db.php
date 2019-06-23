<?php

$sql = "SELECT `id`,`name`,`avatar`,`affiliation`,`email`,`homepage`,`weblog`,`profile`,`Title`,`homepic` FROM `blog` where `id` = '". site_id ."'";
$site_id;
$site_name;
$site_avatar;
$site_affiliation;
$site_email;
$site_homepage;
$site_weblog;
$site_profile;
$site_homepic;
$site_title;
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($site_id, $site_name, $site_avatar, $site_affiliation, $site_email,$site_homepage, $site_weblog, $site_profile, $site_title, $site_homepic);
    $stmt->fetch();
}
if (empty($site_id) || $site_id != site_id) {
    $sql = "INSERT INTO `blog` (`id`, `name`, `avatar`, `affiliation`, `email`, `homepage`, `weblog`, `profile`, `Title`, `homepic`) VALUES (NULL, 'موسسه آموزش عالی فردوس', '/images/avatar/1.png', 'موسسه آموزش عالی فردوس', 'info (at) ferdowsmashhad (dot) ac (dot) ir', 'ferdowsmashhad.ac.ir', 'ferdowsmashhad.ac.ir', 'پرتال اساتید موسسه آموزش عالی فردوس', '.', '/images/avatar/1h.png');";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->execute();
    }
}

$sql = "SELECT `id`,`image`,`text`,`bid`,`pid` FROM `gallery` where `bid` = '". site_id ."'";
$gallery_id;
$gallery_image;
$gallery_text;
$gallery_bid;
$gallery_pid;
$gallery_images = array();
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($gallery_id, $gallery_image, $gallery_text, $gallery_bid, $gallery_pid);
    while($stmt->fetch()) {
        $gallery_images[] = array('id' => $gallery_id, 'img'=>$gallery_image,'text'=>$gallery_text,'bid'=>$gallery_bid,'pid'=>(empty($gallery_pid) ? $gallery_id : $gallery_pid));
    }
}

$username= "test";
$sql = "SELECT `id`,`lid`,`name`,`link`, `ico`, `visibility`, `showsilder` FROM `menu` where `bid` = '". site_id ."'";
$menu_lid;
$menu_id;
$menu_ico;
$menu_name;
$menu_link;
$menu_visibility;
$menu_showsilder;
$page_menus = array();
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($menu_id, $menu_lid, $menu_name, $menu_link, $menu_ico, $menu_visibility, $menu_showsilder);
    while($stmt->fetch()) {
        $page_menus["l$menu_lid"][] = array('id' => $menu_id, 'link'=>$menu_link,'text'=>$menu_name, 'ico'=>$menu_ico, 'visibility'=>$menu_visibility, 'showsilder'=>$menu_showsilder);
    }
}

$sql = "SELECT `id`,`name`,`image`,`short`,`dir` FROM `language` where `bid` = '". site_id ."'";
$language_lid = -1;
$language_name;
$language_image;
$language_short;
$language_dir;
$languages = array();
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($language_lid, $language_name, $language_image,$language_short,$language_dir);
    while($stmt->fetch()) {
        $languages[] = array('id'=>$language_lid,'name'=>$language_name,'short'=>$language_short, 'dir'=>$language_dir, 'image'=>$language_image);
    }
    $language_lid = 1;
    $language_dir = 'rtl';
}

$sql = "SELECT `id`,`name`,`slide` FROM `slider` where `bid` = '". site_id ."'";
$slider_id = -1;
$slider_name;
$slider_slide;
$sliders = array();
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($slider_id, $slider_name, $slider_slide);
    while($stmt->fetch()) {
        $sliders[] = array('id'=>$slider_id,'name'=>$slider_name,'slide'=>$slider_slide);
    }
}

$sql = "SELECT `id`,`name`,`path`,`hash` FROM `files` where `bid` = '". site_id ."'";
$files_id = -1;
$files_name;
$files_path;
$files_hash;
$files = array();
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($files_id, $files_name, $files_path, $files_hash);
    while($stmt->fetch()) {
        $files[] = array('id'=>$files_id,'name'=>$files_name,'path'=>$files_path,'hash'=>$files_hash);
    }
}

// $sql = "SELECT `id`, `image`, `comingsoon`, `title`, `review`, `view`, `details` FROM `publications` where `bid` = '". site_id ."'";
// $publications = array();
// $publications['header'] = array('image'=>'file', 'comingsoon'=> 'checkbox', 'title'=> 'text', 'details'=> 'richtextbox');
// $publications_id;
// $publications_image;
// $publications_comingsoon;
// $publications_title;
// $publications_review;
// $publications_view;
// $publications_details;
// if ($stmt = $mysqli->prepare($sql)) {
//     $stmt->execute();
//     $stmt->bind_result($publications_id, $publications_image, $publications_comingsoon, $publications_title, $publications_review,$publications_view, $publications_details);
//     $stmt->store_result();
//     while($stmt->fetch()) {
//         $publications["i".$publications_id] = array('id'=>$publications_id, 'image'=>$publications_image, 'comingsoon'=> $publications_comingsoon, 'title'=> $publications_title, 'review'=> $publications_review, 'view'=>$publications_view, 'details'=> get_words($publications_details));
//     }
// }

// $sql = "SELECT `id`, `title`, `level`, `student`, `present` FROM `theses` where `bid` = '". site_id ."'";
// $theses = array();
// $theses['header'] = array('title'=>'text', 'level'=> 'text', 'student'=> 'text', 'present'=> 'date');
// $theses_id;
// $theses_title;
// $theses_level;
// $theses_student;
// $theses_present;
// if ($stmt = $mysqli->prepare($sql)) {
//     $stmt->execute();
//     $stmt->bind_result($theses_id, $theses_title, $theses_level, $theses_student, $theses_present);
//     $stmt->store_result();
//     while($stmt->fetch()) {
//         $theses["i".$theses_id] = array('id'=>$theses_id, 'title'=>$theses_title, 'level'=> $theses_level, 'student'=> $theses_student, 'present'=> $theses_present);
//     }
// }

// $sql = "SELECT `id`,`title`,`propagate`,`date`,`faculty`,`type`,`author`,`link` FROM `book` where `bid` = '". site_id ."'";
// $book = array();
// $book['header'] = array('title'=>'text', 'propagate'=> 'text', 'date'=> 'date', 'faculty'=> 'text', 'type'=> 'text', 'author'=> 'text', 'link'=> 'text');
// $book_id;
// $book_title;
// $book_propagate;
// $book_date;
// $book_faculty;
// $book_type;
// $book_author;
// $book_link;
// if ($stmt = $mysqli->prepare($sql)) {
//     $stmt->execute();
//     $stmt->bind_result($book_id, $book_title, $book_propagate, $book_date, $book_faculty, $book_type, $book_author, $book_link);
//     $stmt->store_result();
//     while($stmt->fetch()) {
//         $book["i".$book_id] = array('id'=>$book_id, 'title'=>$book_title, 'propagate'=> $book_propagate, 'date'=> $book_date, 'faculty'=> $book_faculty, 'type'=> $book_type, 'author'=> $book_author, 'link'=> $book_link);
//     }
// }

// $sql = "SELECT `id`, `title`, `level`, `link` FROM `teaching` where `bid` = '". site_id ."'";
// $teaching = array();
// $teaching['header'] = array('title'=>'text', 'level'=> 'text', 'link'=> 'text');
// $teaching_id;
// $teaching_title;
// $teaching_level;
// $teaching_link;
// if ($stmt = $mysqli->prepare($sql)) {
//     $stmt->execute();
//     $stmt->bind_result($teaching_id, $teaching_title, $teaching_level, $teaching_link);
//     $stmt->store_result();
//     while($stmt->fetch()) {
//         $teaching["i".$teaching_id] = array('id'=>$teaching_id, 'title'=>$teaching_title, 'level'=> $teaching_level, 'link'=> $teaching_link);
//     }
// }

// $sql = "SELECT `id`, `name`, `field`, `avatar`, `postgraduate`, `honorable` FROM `students` where `bid` = '". site_id ."'";
// $students = array();
// $students['header'] = array('name'=>'text', 'field'=> 'text', 'avatar'=> 'file', 'postgraduate'=> 'checkbox', 'honorable'=> 'checkbox');
// $students_id;
// $students_name;
// $students_field;
// $students_avatar;
// $students_postgraduate;
// $students_honorable;
// if ($stmt = $mysqli->prepare($sql)) {
//     $stmt->execute();
//     $stmt->bind_result($students_id, $students_name, $students_field, $students_avatar, $students_postgraduate, $students_honorable);
//     $stmt->store_result();
//     while($stmt->fetch()) {
//         $students["i".$students_id] = array('id'=>$students_id, 'name'=>$students_name, 'field'=> $students_field, 'avatar'=> $students_avatar, 'postgraduate'=> $students_postgraduate, 'honorable'=> $students_honorable);
//     }
// }

// $sql = "SELECT `id`, `title`, `at`, `date`, `link` FROM `presentations` where `bid` = '". site_id ."'";
// $presentations = array();
// $presentations['header'] = array('title'=>'text', 'at'=> 'text', 'date'=> 'date', 'link'=> 'text');
// $presentations_id;
// $presentations_title;
// $presentations_at;
// $presentations_date;
// $presentations_link;
// if ($stmt = $mysqli->prepare($sql)) {
//     $stmt->execute();
//     $stmt->bind_result($presentations_id, $presentations_title, $presentations_at, $presentations_date, $presentations_link);
//     $stmt->store_result();
//     while($stmt->fetch()) {
//         $presentations["i".$presentations_id] = array('id'=>$presentations_id, 'title'=>$presentations_title, 'at'=> $presentations_at, 'date'=> $presentations_date, 'link'=> $presentations_link);
//     }
// }

// $sql = "SELECT `id`, `title`, `level`, `data` FROM `course` where `bid` = '". site_id ."'";
// $course = array();
// $course['header'] = array('title'=>'text', 'level'=> 'text', 'data'=> 'text', 'link'=> 'text');
// $course_id;
// $course_title;
// $course_level;
// $course_data;
// if ($stmt = $mysqli->prepare($sql)) {
//     $stmt->execute();
//     $stmt->bind_result($course_id, $course_title, $course_level, $course_data);
//     $stmt->store_result();
//     while($stmt->fetch()) {
//         $course["i".$course_id] = array('id'=>$course_id, 'title'=>$course_title, 'level'=> $course_level, 'data'=> $course_data);
//     }
// }
// $syllabus = $course;
if (!empty($cid)) {
    $sql = "SELECT `id`,`content`,`created`,`mid`,`parent` FROM `post` where `mid` = '". $cid ."'";
    $post_created;
    $post_id;
    $post_mid;
    $post_content;
    $page_parent;
    $page_showslider = 1;
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($post_id, $post_content, $post_created, $post_mid, $page_parent);
                $stmt->fetch();
                $post_content = html_entity_decode(htmlspecialchars_decode($post_content));
            }

    $sql = "SELECT `showsilder` FROM `menu` where `id` = '". $cid ."'";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($page_showslider);
                $stmt->fetch();
            }
}
?>