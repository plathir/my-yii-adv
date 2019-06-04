-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2019 at 07:29 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.6.14-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_yii2_adv`
--


--
-- Dumping data for table `user`
--

INSERT INTO {{%user}} (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `timezone`, `activate_token`, `status`, `created_at`, `updated_at`, `last_visited`) VALUES
(1, 'admin', 'aI3LSivTOiqVG_gMtOvbZ6gkE7j1QSwP', '$2y$13$1ipYiRsDe/ZDC0Gv2lAaAOSN5yK9jOSm7II79L0iLlxOWI7Dccwii', 'FCbZoXv7p73VRgpfPuV7miE2ZXNuK98m_1447320611', 'plathir@gmail.com', 'Europe/Athens', '', 10, 1427976606, 1510232736, 1551252446);

--
-- Dumping data for table `user_profile`
--

INSERT INTO {{%user_profile}} (`id`, `first_name`, `last_name`, `gender`, `birth_date`, `profile_image`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'Panagiotis', 'Lathiris', 1, '1974-01-26', '', 1513163694, 1536661049, 1);


--
-- Dumping data for table `auth_rule`
--

INSERT INTO {{%auth_rule}} (`name`, `data`, `created_at`, `updated_at`) VALUES
('isAuthor', 'O:40:"plathir\\smartblog\\common\\rbac\\AuthorRule":3:{s:4:"name";s:8:"isAuthor";s:9:"createdAt";i:1459857889;s:9:"updatedAt";i:1469892828;}', 1459857889, 1469892828);

--
-- Dumping data for table `auth_item`
--

INSERT INTO {{%auth_item}} (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1447418359, 1447418359),
('/admin/*', 2, NULL, NULL, NULL, 1445343489, 1445343489),
('/apps/*', 2, NULL, NULL, NULL, 1488275985, 1488275985),
('/blog/*', 2, NULL, NULL, NULL, 1488275819, 1488275819),
('/debug/*', 2, NULL, NULL, NULL, 1489157119, 1489157119),
('/doc/*', 2, NULL, NULL, NULL, 1488275945, 1488275945),
('/gii', 2, NULL, NULL, NULL, 1486113328, 1486113328),
('/gii/*', 2, NULL, NULL, NULL, 1488273818, 1488273818),
('/log/*', 2, NULL, NULL, NULL, 1516707155, 1516707155),
('/logreader/*', 2, NULL, NULL, NULL, 1516784972, 1516784972),
('/settings/*', 2, NULL, NULL, NULL, 1506689492, 1506689492),
('/site/*', 2, NULL, NULL, NULL, 1488275718, 1488275718),
('/smartblog/categories/*', 2, NULL, NULL, NULL, 1461588459, 1461588459),
('/snippets/*', 2, NULL, NULL, NULL, 1488275954, 1488275954),
('/templates/*', 2, NULL, NULL, NULL, 1522046044, 1522046044),
('/testroute/index', 2, NULL, NULL, NULL, 1474577629, 1474577629),
('/user/*', 2, NULL, NULL, NULL, 1447413321, 1447413321),
('/user/admin/*', 2, NULL, NULL, NULL, 1446201290, 1446201290),
('/widgets/*', 2, NULL, NULL, NULL, 1488275962, 1488275962),
('AdminCreateUser', 2, 'Admin Create a user', NULL, NULL, 1447401012, 1447401012),
('AdminCreateUserProfile', 2, 'Admin Create user profile', NULL, NULL, 1447401012, 1447401012),
('AdminDeleteUser', 2, 'Admin Delete user', NULL, NULL, 1447401012, 1447401012),
('AdminDeleteUserProfile', 2, 'Admin Delete user profile', NULL, NULL, 1447401013, 1447401013),
('AdminFileUpload', 2, 'Admin Delete user profile', NULL, NULL, 1447401013, 1447401013),
('AdminIndexUser', 2, 'Admin Index of users', NULL, NULL, 1447401012, 1447401012),
('AdminResetUserPassword', 2, 'Admin Reset user password', NULL, NULL, 1447401012, 1447401012),
('AdminSetUserPassword', 2, 'Admin Set user password', NULL, NULL, 1447401012, 1447401012),
('AdminUpdateUser', 2, 'Admin Update user', NULL, NULL, 1447401012, 1447401012),
('AdminUpdateUserProfile', 2, 'Admin Update user profile', NULL, NULL, 1447401013, 1447401013),
('AdminViewUser', 2, 'Admin View user', NULL, NULL, 1447401012, 1447401012),
('AppsActivate', 2, 'AppsActivate', NULL, NULL, 1488354742, 1488354742),
('AppsAdmin', 1, 'AppsAdmin', NULL, NULL, 1488354758, 1488354758),
('AppsDashboard', 2, 'Apps Dashboard', NULL, NULL, 1488354599, 1488354599),
('AppsIndex', 2, 'AppsIndex', NULL, NULL, 1488354618, 1508750010),
('AppsInstall', 2, 'AppsInstall', NULL, NULL, 1488354644, 1488354644),
('AppsUninstall', 2, 'AppsUninstall', NULL, NULL, 1488354661, 1488354661),
('AppsView', 2, 'AppsView', NULL, NULL, 1488354631, 1488354631),
('Author', 1, 'Blog Post Author', NULL, NULL, 1459858206, 1459858265),
('BackendIndex', 2, NULL, NULL, NULL, 1490427332, 1490427332),
('BackendSite', 1, NULL, NULL, NULL, 1490427453, 1490427453),
('BlogAdmin', 1, 'Blog Administrator', NULL, NULL, 1469970864, 1469970864),
('BlogCreatePost', 2, 'Create new Post', NULL, NULL, 1470024658, 1470024658),
('BlogPostIndex', 2, 'Blog Post Index', NULL, NULL, 1470033989, 1470033989),
('BlogRebuildTags', 2, 'Blog Rebuild Tags', NULL, NULL, 1476029191, 1476029191),
('BlogUpdateOwnPost', 2, 'Update Own Posts', 'isAuthor', NULL, 1459858140, 1470024505),
('BlogUpdatePost', 2, 'Update Post', NULL, NULL, 1459860114, 1470024539),
('Publisher', 1, 'Blog Post Publisher', NULL, NULL, 1459860045, 1459860045),
('sysadmin', 1, 'System Administrator', NULL, NULL, 1446107563, 1446107563),
('User', 1, 'User role', NULL, NULL, 1447401013, 1447401013),
('user-admin', 2, 'Full User Administration', NULL, NULL, 1446201463, 1446201489),
('UserAccountChangePassword', 2, 'User change password', NULL, NULL, 1447401013, 1447401013),
('UserAccountEdit', 2, 'User edit account', NULL, NULL, 1447401013, 1447401013),
('UserAccountIndex', 2, 'User Accounts index', NULL, NULL, 1447401013, 1447401013),
('UserAccountMy', 2, 'User My data', NULL, NULL, 1447401013, 1447401013),
('UserAdmin', 1, 'User Administrator role', NULL, NULL, 1447401013, 1447401013),
('UserProfileCreate', 2, 'UserProfileCreate', NULL, NULL, 1511782108, 1511782108),
('UserProfileDelete', 2, 'UserProfileDelete', NULL, NULL, 1511782123, 1511782123),
('UserProfileEdit', 2, 'UserProfileEdit', NULL, NULL, 1511782090, 1511782090);


--
-- Dumping data for table `auth_assignment`
--

INSERT INTO {{%auth_assignment}} (`item_name`, `user_id`, `created_at`) VALUES
('sysadmin', '1', 1446108332);


--
-- Dumping data for table `auth_item_child`
--

INSERT INTO {{%auth_item_child}} (`parent`, `child`) VALUES
('sysadmin', '/admin/*'),
('sysadmin', '/apps/*'),
('BlogAdmin', '/blog/*'),
('sysadmin', '/debug/*'),
('User', '/doc/*'),
('sysadmin', '/gii'),
('sysadmin', '/gii/*'),
('sysadmin', '/log/*'),
('sysadmin', '/logreader/*'),
('sysadmin', '/settings/*'),
('BackendSite', '/site/*'),
('sysadmin', '/site/*'),
('User', '/snippets/*'),
('sysadmin', '/templates/*'),
('User', '/user/*'),
('user-admin', '/user/admin/*'),
('sysadmin', '/widgets/*'),
('UserAdmin', 'AdminCreateUser'),
('UserAdmin', 'AdminCreateUserProfile'),
('UserAdmin', 'AdminDeleteUser'),
('UserAdmin', 'AdminDeleteUserProfile'),
('UserAdmin', 'AdminFileUpload'),
('UserAdmin', 'AdminIndexUser'),
('UserAdmin', 'AdminResetUserPassword'),
('UserAdmin', 'AdminSetUserPassword'),
('UserAdmin', 'AdminUpdateUser'),
('UserAdmin', 'AdminUpdateUserProfile'),
('UserAdmin', 'AdminViewUser'),
('AppsAdmin', 'AppsActivate'),
('sysadmin', 'AppsAdmin'),
('AppsAdmin', 'AppsDashboard'),
('AppsAdmin', 'AppsIndex'),
('AppsAdmin', 'AppsInstall'),
('AppsAdmin', 'AppsUninstall'),
('AppsAdmin', 'AppsView'),
('BlogAdmin', 'Author'),
('Publisher', 'Author'),
('BackendSite', 'BackendIndex'),
('sysadmin', 'BackendSite'),
('sysadmin', 'BlogAdmin'),
('Author', 'BlogCreatePost'),
('Publisher', 'BlogRebuildTags'),
('Author', 'BlogUpdateOwnPost'),
('Publisher', 'BlogUpdatePost'),
('BlogAdmin', 'Publisher'),
('sysadmin', 'User'),
('User', 'UserAccountChangePassword'),
('User', 'UserAccountEdit'),
('User', 'UserAccountMy'),
('sysadmin', 'UserAdmin'),
('User', 'UserProfileCreate'),
('User', 'UserProfileDelete'),
('User', 'UserProfileEdit');


INSERT INTO {{%menu}} (`id`, `name`, `parent`, `route`, `order`, `data`, `app`) VALUES
(1, 'PermissionsMenu', NULL, NULL, 1, NULL, ''),
(2, 'Permissions', 1, '/admin/permission', 4, NULL, ''),
(4, 'Roles', 1, '/admin/role', 1, NULL, ''),
(5, 'Routes', 1, '/admin/route', 2, NULL, ''),
(6, 'Rules', 1, '/admin/rule', 3, NULL, ''),
(7, 'Assignments', 1, '/admin/assignment', 5, NULL, ''),
(8, 'Menu', 1, '/admin/menu', 6, NULL, '');



--
-- Dumping data for table `templates_types`
--

INSERT INTO {{%templates_types}} (`name`, `descr`) VALUES
('email', 'Template for emails'),
('email1', 'Test type email1'),
('newsletter', 'News Letter');

--
-- Dumping data for table `templates`
--

INSERT INTO {{%templates}} (`id`, `type`, `descr`, `text`) VALUES
(1, 'email', 'Registration email 1', '<p>This is a test template for registration</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(4, 'newsletter', 'sdfsdfsd', '<p>sdfsdfsd</p>\r\n'),
(5, 'email1', 'sdfdsfsdf', '<p><span style="color:#FF0000">Template&nbsp;</span></p>\r\n\r\n<p>Dear {user}</p>\r\n\r\n<p><img alt="" src="media/images/templates/pexels-photo-325229.jpeg" /><img alt="" src="/media/images/templates/pexels-photo-325229.jpeg" style="height:105px; width:300px" /></p>\r\n\r\n<p><img alt="" src="/media/images/templates/pexels-photo-325229.jpeg" style="height:442px; width:300px" /></p>\r\n\r\n<p>Regards</p>\r\n\r\n<div>\r\n<div>\r\n<p>Taken from wikpedia</p>\r\n</div>\r\n</div>\r\n');


--
-- Dumping data for table `widgets_types`
--

INSERT INTO {{%widgets_types}} (`tech_name`, `module_name`, `widget_name`, `widget_class`, `description`) VALUES
('be_blog_carousel', 'backend-blog', 'Backend Blog Carousel', '\\plathir\\smartblog\\backend\\widgets\\CarouselPosts', 'Blog Carousel'),
('be_blog_categories_with_subcategories', 'frontend-blog', 'Blog Categories with Subcategories', 'plathir\\smartblog\\frontend\\widgets\\CategoriesWithSubCategories', 'Blog Categories with Subcategories'),
('be_blog_latest_post1', 'backend-blog', 'Latest posts test', 'plathir\\smartblog\\backend\\widgets\\LatestPosts', 'test'),
('be_blog_latest_posts', 'backend-blog', 'Latest Posts', 'plathir\\smartblog\\backend\\widgets\\LatestPosts', 'Latest Posts'),
('be_blog_most_visited_post', 'backend-blog', 'Most Visited Posts', 'plathir\\smartblog\\backend\\widgets\\MostVisitedPosts', 'Most Visited Posts'),
('be_blog_static_pages_widget', 'backend-blog', 'Static Page', 'plathir\\smartblog\\common\\widgets\\StaticPagesWidget', 'Static Page'),
('be_blog_tag_cloud', 'backend-blog', 'Tag Cloud', 'plathir\\smartblog\\backend\\widgets\\TagCloud', 'Tag Cloud'),
('be_blog_top_authors', 'backend-blog', 'Top Authors', 'plathir\\smartblog\\backend\\widgets\\TopAuthors', 'Top Authors'),
('be_blog_top_rated', 'backend-blog', 'Top Rated', 'plathir\\smartblog\\backend\\widgets\\TopRated', 'Top Rated'),
('be_dashb_blog_latest_post', 'backend-backend_dashboard', 'Latest Posts', 'plathir\\smartblog\\backend\\widgets\\LatestPosts', 'Latest Posts'),
('be_latest_users', 'backend-user', 'Latest Users', 'plathir\\user\\backend\\widgets\\LatestUsers', 'Latest Users'),
('fe_blog_carousel', 'frontend-blog', 'Frontend Carousel', '\\plathir\\smartblog\\frontend\\widgets\\CarouselPosts', 'Frontend Carousel'),
('fe_blog_latest_posts', 'frontend-blog', 'Frontend Latest Posts', 'plathir\\smartblog\\frontend\\widgets\\LatestPosts', 'Frontend Latest Posts'),
('fe_blog_most_visited_posts', 'frontend-blog', 'Frontend Most Visited Posts', 'plathir\\smartblog\\frontend\\widgets\\MostVisitedPosts', 'Frontend Most Visited Posts'),
('fe_blog_tag_cloud_posts', 'frontend-blog', 'Frontend Tag Cloud Blog ', 'plathir\\smartblog\\frontend\\widgets\\TagCloud', 'Frontend Tag Cloud Blog '),
('fe_blog_top_authors', 'frontend-blog', 'FrontEnd Top Authors ', '\\plathir\\smartblog\\frontend\\widgets\\TopAuthors', 'FrontEnd Top Authors '),
('fe_blog_top_categories', 'frontend-blog', 'FrontEnd Top Categories', '\\plathir\\smartblog\\frontend\\widgets\\TopCategories', 'Top Categories');

--
-- Dumping data for table `widgets_positions`
--

INSERT INTO {{%widgets_positions}} (`tech_name`, `name`, `publish`, `module_name`) VALUES
('be_blog_dashboard1', 'Backend DashBoard 1', 1, 'backend-backend_dashboard'),
('be_blog_dashboard2', 'Backend DashBoard 2', 1, 'backend-backend_dashboard'),
('be_blog_position1', 'Position 1', 1, 'backend-blog'),
('be_blog_position1test', 'test position', 0, 'backend-blog'),
('be_blog_position2', 'position 2', 1, 'backend-blog'),
('be_blog_position3', 'Position 3', 1, 'backend-blog'),
('be_blog_position4', 'Position 4', 1, 'backend-blog'),
('be_dashboard_position1', 'DashBoard Position 1', 1, 'backend-blog'),
('be_user_dashboard', 'Backend User DashBoard', 1, 'backend-user'),
('fe_blog_dashboard', 'Frontend Blog Dashboard', 1, 'frontend-blog'),
('fe_blog_dashboard_footer', 'Frontend Dashboard footer', 1, 'frontend-frontend_dashboard'),
('fe_blog_dashboard_right', 'Frontend Blog Dashboard right', 1, 'frontend-blog'),
('fe_dashboard', 'Frontend Dashboard', 1, 'frontend-frontend_dashboard'),
('fe_dashboard_about', 'About', 1, 'frontend-frontend_dashboard'),
('fe_dashboard_global_footer', 'Frontend Dashboard Global Footer', 1, 'frontend-frontend_dashboard'),
('fe_dashboard_global_header', 'Frontend Dashboard Global Header', 1, 'frontend-frontend_dashboard'),
('fe_dashboard_header', 'Frontend Dashboard Header', 1, 'frontend-frontend_dashboard'),
('fe_dashboard_right', 'Frontend Dashboard right', 1, 'frontend-frontend_dashboard'),
('fe_dashboard_terms', 'Terms of use', 1, 'frontend-frontend_dashboard');


--
-- Dumping data for table `widgets_layouts`
--

INSERT INTO {{%widgets_layouts}} (`tech_name`, `name`, `path`, `html_layout`, `publish`, `module_name`) VALUES
('be_blog_dashboard_layout', 'Blog Backend Dashboard Layout', '@vendor/plathir/yii2-smart-blog/backend/themes/smart/views/default/index.php', '    <div class="row">\r\n        <div class="col-lg-12">        \r\n            {be_blog_position1}\r\n        </div>\r\n    </div>\r\n\r\n    <div class="row">\r\n        <div class="col-lg-4">\r\n            {be_blog_position2}\r\n        </div>\r\n        <div class="col-lg-8">\r\n             {be_blog_position3}\r\n        </div>\r\n    </div>\r\n\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            {be_blog_position4}\r\n        </div>  \r\n    </div>\r\n    ', 1, 'backend-blog'),
('be_blog_main_dashboard_layout', 'Blog Backend main Dashboard Layout', '@vendor/plathir/yii2-smart-blog/backend/themes/smart/views/layouts/main.php', '{CONTENT}\r\n', 1, 'backend-blog'),
('be_widgets_layout_layout', 'be_widgets_layout_layout', '@vendor/plathir/yii2-smart-widgets/backend/themes/smart/views/layouts/main.php', '{CONTENT}', 1, 'backend-widgets'),
('fe_blog_dashboard_layout', 'fe_blog_dashboard', '@vendor/plathir/yii2-smart-blog/frontend/themes/smart/views/layouts/main.php', '            \r\n            <div class="blog-list-left col-lg-8 col-md-8">  \r\n                        {CONTENT}\r\n            </div>\r\n\r\n            <div class="blog-sidebar-right col-lg-4 col-md-4 col-sm-12 col-xs-12">\r\n                        {fe_blog_dashboard_right}\r\n            </div>\r\n', 1, 'frontend-blog'),
('fe_blog_layout_main', 'Blog Main Layout', '@vendor/plathir/yii2-smart-blog/frontend/themes/smart/views/default/index.php', '    <div class="row">\r\n        <div class="col-lg-12">        \r\n            {fe_blog_dashboard}\r\n        </div>\r\n    </div>', 1, 'frontend-blog'),
('fe_global_header', 'Frontend  Global Header', '@frontend/themes/smart/views/layouts/content.php', '{fe_dashboard_global_header}', 0, 'frontend-frontend_dashboard'),
('fe_main_site_layout', 'Frontend Main Site Layout', '@frontend/themes/smart/views/site/index.php', '    <div class="row">\r\n        <div class="col-lg-12">        \r\n            {fe_dashboard_header}\r\n        </div>\r\n\r\n    </div>\r\n    <div class="row">\r\n        <div class="col-lg-9">        \r\n            {fe_dashboard}\r\n        </div>    \r\n        <div class="col-lg-3">    \r\n           {fe_dashboard_right}\r\n        </div>\r\n    </div>', 1, 'frontend-frontend_dashboard');

--
-- Dumping data for table `widgets_positions_sorder`
--

INSERT INTO {{%widgets_positions_sorder}} (`position_tech_name`, `widget_sort_order`) VALUES
('be_blog_dashboard2', '23'),
('be_blog_position1', '152,19,2'),
('be_blog_position2', '20'),
('be_blog_position3', '21'),
('be_blog_position4', '22'),
('be_dashboard_position1', '41'),
('be_user_dashboard', '144'),
('fe_blog_dashboard', '153,40'),
('fe_blog_dashboard_footer', '126'),
('fe_blog_dashboard_right', '139,150,143,151,154'),
('fe_dashboard', '141,148,156,149,157'),
('fe_dashboard_about', '147'),
('fe_dashboard_global_footer', '145'),
('fe_dashboard_global_header', '140'),
('fe_dashboard_header', '160,142'),
('fe_dashboard_right', '62'),
('fe_dashboard_terms', '146');

--
-- Dumping data for table `widgets`
--

INSERT INTO {{%widgets}} (`id`, `widget_type`, `name`, `description`, `position`, `publish`, `config`, `rules`, `created_at`, `updated_at`) VALUES
(2, 'be_blog_latest_posts', 'Latest Blog Posts 1', 'Test Latest Posts', 'be_blog_position1', '1', '{"latest_num":"3","Theme":"smart"}', '', 789722732, 1488791055),
(19, 'be_blog_most_visited_post', 'Most Visited posts', 'Most Visited posts', 'be_blog_position1', '1', '{"posts_num":"3","Theme":"smart"}', '', 1488791208, 1488791360),
(20, 'be_blog_top_authors', 'Top authors', 'Top Authors', 'be_blog_position2', '1', '{"authors_num":"3","Theme":"smart"}', '', 1488791403, 1488791590),
(21, 'be_blog_top_rated', 'Top Rated', 'Top Rated Posts', 'be_blog_position3', '1', '{"posts_num":"3","Theme":"smart"}', '', 1488791538, 1488791557),
(22, 'be_blog_tag_cloud', 'Tag Cloud', 'Tag Cloud', 'be_blog_position4', '1', '{"Theme":"smart"}', '', 1488791646, 1488791671),
(23, 'be_blog_latest_posts', 'Latest Posts', 'Latest Posts for site home page', 'be_blog_dashboard2', '1', '{"latest_num":"10","Theme":"smart"}', '', 1488798985, 1488799013),
(40, 'fe_blog_latest_posts', 'Latest Posts', 'Latest Posts', 'fe_blog_dashboard', '1', '{"latest_num":"10","Theme":"smart","typeView":"blog"}', '', 1490015306, 1516100232),
(41, 'be_blog_latest_posts', 'Latest Posts dashboard position 1', 'Latest Posts dashboard position 1', 'be_dashboard_position1', '1', '{"latest_num":"10","Theme":"smart"}', '', 1490605691, 1490605723),
(62, 'be_blog_static_pages_widget', 'test static pagr', '', 'fe_dashboard_right', '1', '{"page_id":"1","displayTitle":"Page Title","displayIntroText":"","title":"title"}', '', 1493897137, 1521553606),
(126, 'be_blog_static_pages_widget', '', '', 'fe_blog_dashboard_footer', '1', '{"page_id":"1","displayTitle":"","displayIntroText":"","title":""}', '', 1498720528, 1498720857),
(139, 'fe_blog_most_visited_posts', 'Most Visited Posts', 'Most Visited Posts', 'fe_blog_dashboard_right', '1', '{"posts_num":"10","Theme":"smart","title":"Most Visited Posts"}', '', 1505822770, 1505822906),
(140, 'be_blog_static_pages_widget', 'Dashboard Global header', 'Dashboard Global header', 'fe_dashboard_global_header', '1', '{"page_id":"4","displayTitle":"","displayIntroText":"","title":""}', '', 1505823789, 1510217946),
(141, 'be_blog_static_pages_widget', 'Frontend Dashboard', 'Dashboard Global', 'fe_dashboard', '1', '{"page_id":"5","displayTitle":"","displayIntroText":"","title":""}', '', 1506863101, 1507890239),
(142, 'be_blog_static_pages_widget', 'Dashboard header', 'Dashboard header', 'fe_dashboard_header', '1', '{"page_id":"12","displayTitle":"","displayIntroText":"","title":""}', '', 1505824706, 1547123489),
(143, 'fe_blog_tag_cloud_posts', 'Frontend Tag Cloud Blog', 'Frontend Tag Cloud Blog Descr', 'fe_blog_dashboard_right', '1', '{"Theme":"smart","title":"Tag Cloud"}', '', 1505891703, 1505891723),
(144, 'be_latest_users', 'Latest Users', 'Latest Users', 'be_user_dashboard', '1', '{"latest_num":"10","Theme":"smart"}', '', 1508136221, 1508136235),
(145, 'be_blog_static_pages_widget', 'Global footer', 'Global footer', 'fe_dashboard_global_footer', '1', '{"page_id":"7","displayTitle":"","displayIntroText":"","title":""}', '', 1510310087, 1510310159),
(146, 'be_blog_static_pages_widget', 'Terms of Use', 'Terms of Use', 'fe_dashboard_terms', '1', '{"page_id":"8","displayTitle":"","displayIntroText":"","title":"Terms of Use"}', '', 1512459652, 1512476715),
(147, 'be_blog_static_pages_widget', 'About', 'About', 'fe_dashboard_about', '1', '{"page_id":"9","displayTitle":"","displayIntroText":"","title":"About"}', '', 1512460374, 1512476664),
(148, 'fe_blog_latest_posts', '', '', 'fe_dashboard', '1', '{"latest_num":"10","Theme":"smart","typeView":"grid"}', '', 1516367951, 1518431523),
(149, 'fe_blog_most_visited_posts', '', '', 'fe_dashboard', '1', '{"posts_num":"10","Theme":"smart","title":"Most Visited Posts","typeView":"media"}', '', 1516370304, 1516370665),
(150, 'fe_blog_top_authors', 'Top Authors', 'Top Authors', 'fe_blog_dashboard_right', '1', '{"authors_num":10,"Theme":"smart","title":"Top Authors"}', '', 1519717844, 1519717844),
(151, 'fe_blog_top_categories', 'Top Categories', 'Top Categories', 'fe_blog_dashboard_right', '1', '{"category_num":10,"Theme":"smart","title":"Top Categories"}', '', 1519977274, 1519977354),
(152, 'be_blog_carousel', 'Backend Blog Carousel', 'Backend Blog Carousel', 'be_blog_position1', '1', '{"posts":"","carousel_id":"1","height":"300px","Theme":"smart"}', '', 1520605176, 1520605383),
(153, 'fe_blog_carousel', 'FrontEnd Blog Carousel', 'FrontEnd Blog Carousel', 'fe_blog_dashboard', '1', '{"posts":"","carousel_id":"2","height":"400px","Theme":"smart"}', '', 1521098942, 1521127057),
(154, 'be_blog_categories_with_subcategories', '', 'Blog Categories with Subcategories', 'fe_blog_dashboard_right', '1', '{"category_level":"0","category_id":"","Theme":"smart","title":"Top Categories","typeView":"media"}', '', 1533797870, 1533798730),
(160, 'be_blog_static_pages_widget', 'front Page jumbotron', 'front Page jumbotron', 'fe_dashboard_header', '1', '{"page_id":"13","displayTitle":"","displayIntroText":"","title":""}', '', 1547626348, 1547626499);

--
-- Dumping data for table `settings`
--

INSERT INTO {{%settings}} (`id`, `module_name`, `key_name`, `description`, `value`, `type`, `active`, `created_at`, `updated_at`) VALUES
(1, 'site', 'ApplicationName', 'My yii2 smart Pack', 'SmartByii.com', 'string', 1, 0, 1510150779),
(3, 'user', 'AdminEmail', 'Administrator email address', 'plathir@gmail.com', 'string', 1, 1448265937, 1461146805),
(4, 'site', 'ApplicationNameMini', 'Mini Name for Application', 'SBYii', 'string', 1, 1448266221, 1510133481),
(5, 'apptest1', 'test1', 'test1', 'apptest1 test1', 'string', 1, 1450344545, 1458047992),
(6, 'site', 'FacebookClientID', 'FacebookClientID', '1766681353637005', 'string', 0, 1452780383, 1513003640),
(7, 'site', 'FacebookClientSecret', 'FacebookClientSecret', '5f6758b7f656ed32f55298fb6231679f', 'string', 0, 1453376074, 1513003640),
(377, 'site', 'NumOfAppsFeNavBar ', 'NumOfAppsFeNavBar ', '1', 'integer', 1, 1504611701, 1512045457),
(378, 'site', 'ShortDateFormat', 'ShortDateFormat', 'd-m-Y', 'string', 1, 1506689581, 1507551373),
(379, 'site', 'DBShortDateFormat', 'DBShortDateFormat', '%d-%m-%Y', 'string', 1, 1506690713, 1507551373),
(380, 'site', 'FilterShortDateFormat', 'FilterShortDateFormat', 'dd-mm-yyyy', 'string', 1, 1506692298, 1507551373),
(381, 'user', 'AssignUserRolesAfterCreate', 'AssignUserRolesAfterCreate', 'User,Author', 'string', 1, 1507706594, 1507706650),
(382, 'site', 'InputShortDateDisplayFormat', 'InputShortDateDisplayFormat', 'php:d-m-Y', 'string', 1, 1507797819, 1507797819),
(383, 'site', 'InputShortDateSaveFormat', 'InputShortDateSaveFormat', 'php:Y-m-d', 'string', 1, 1507797972, 1507797972),
(384, 'site', 'displayTimezone', 'displayTimezone', 'Europe/Athens', 'string', 1, 1507799445, 1507799445),
(385, 'site', 'InputShortDateTimeDisplayFormat', 'InputShortDateTimeDisplayFormat', 'php:d-m-Y H:i:s', 'string', 1, 1507799665, 1507800396),
(386, 'site', 'InputShortDateTimeSaveFormat', 'InputShortDateTimeSaveFormat', 'php:U', 'string', 1, 1507799849, 1507799849),
(387, 'site', 'SnippetsMediaPath', 'SnippetsMediaPath', '@media\\images\\snippets', 'string', 1, 1509348871, 1527161162),
(388, 'site', 'SnippetsMediaUrl', 'SnippetsMediaUrl', '@MediaUrl/images/settings', 'string', 1, 1509348938, 1509348938),
(389, 'user', 'DefaultRoles', 'DefaultRoles', 'User,Author', 'string', 1, 1512118110, 1512118125),
(390, 'site', 'TemplatesMediaPath', 'TemplatesMediaPath', '@media/images/templates', 'string', 1, 1522045919, 1522156725),
(391, 'site', 'TemplatesMediaUrl', 'TemplatesMediaUrl', '@MediaUrl/images/templates', 'string', 1, 1522045964, 1522155360),
(392, 'user', 'RegistrationTemplate', 'RegistrationTemplate', '1', 'string', 1, 1522221358, 1522221358),
(393, 'site', 'ApplicationNameHTML', 'ApplicationNameHTML', '<b>SmartB</b>yii Local', 'string', 1, 1540988481, 1540988988),
(394, 'site', 'MasterContentLang', 'Master Content Language', 'en', 'string', 1, 1548662607, 1548662649),
(395, 'site', 'DisqusShortname', 'DisqusShortname', 'developerpagesgr', 'string', 1, 1549525898, 1549527220),
(396, 'site', 'Comments', 'Comments', '0', 'boolean', 1, 1549527199, 1549527246),
(397, 'site', 'FrontendTheme ', 'FrontendTheme', '', 'string', 1, 1549527199, 1549527246),
(398, 'site', 'BackendTheme ', 'BackendTheme', '', 'string', 1, 1549527199, 1549527246);

--
-- Dumping data for table `snippets`
--

INSERT INTO {{%snippets}} (`id`, `description`, `example`, `full_text`, `created_by`, `created_at`, `updated_by`, `updated_at`, `publish`) VALUES
(2, 'TimeStamp behavior', '', '## TimeStamp behavior\r\n**In Model : **\r\n```\r\n     use yii\\behaviors\\TimestampBehavior;\r\n     use yii\\db\\ActiveRecord;\r\n    \r\n       public function behaviors() {\r\n        return [\r\n            ''timestampBehavior'' =>\r\n            [\r\n                ''class'' => TimestampBehavior::className(),\r\n                ''attributes'' => [\r\n                    ActiveRecord::EVENT_BEFORE_INSERT => [''created_at'', ''updated_at''],\r\n                    ActiveRecord::EVENT_BEFORE_UPDATE => [''updated_at''],\r\n                ],\r\n                // if you''re using datetime instead of UNIX timestamp:\r\n                ''value'' => function() {\r\n            return date(''U'');\r\n        }\r\n            ]\r\n        ];\r\n    }\r\n```\r\n', 1, 1, 1, 1509260115, '1'),
(3, 'Publish/Unpublish budge', '', '**In Model:**\r\n\r\n```\r\npublic function getPublishbadge() {\r\n	$badge = '''';\r\n  switch ($this->publish) {\r\n        case 0:\r\n             $badge = ''<span class="label label-danger">Unpublished</span>'';\r\n               break;\r\n         case 1:\r\n               $badge = ''<span class="label label-success">Published</span>'';\r\n               break;\r\n         default:\r\n                   break;\r\n    }\r\n       return $badge;       \r\n } \r\n```\r\n\r\n**In View**\r\n\r\n```\r\n  <?= echo $model->Publishbadge; ?> \r\n```\r\n\r\n**In DetailView:**\r\n```\r\n      DetailView::widget([\r\n        ''model'' => $model,\r\n        ''attributes'' => [\r\n            ...\r\n            ''Publishbadge:html''\r\n        ],\r\n    ])\r\n```\r\n\r\n**In GridView :**\r\n```\r\n  GridView::widget([\r\n      ''dataProvider'' => $dataProvider,\r\n       ''filterModel'' => $searchModel,\r\n          ''columns'' => [\r\n             ...\r\n  \r\n              [\r\n                ''attribute'' => ''publish'',\r\n                 ''value'' => function($model, $key, $index, $widget) {\r\n                              return $model->publishbadge;\r\n                            },\r\n                 ''format'' => ''html'',\r\n                  ''filter'' => \\yii\\bootstrap\\Html::activeDropDownList($searchModel, ''publish'', [''0'' => ''Unpublished'', ''1'' => ''Published''], [''class'' => ''form-control'', ''prompt'' => ''Select...'']),\r\n                                 ''contentOptions'' => [''style'' => ''width: 10%;'']\r\n              ],\r\n          ]\r\n```\r\n', 1, 1509175234, 1, 1509175410, '1'),
(4, 'Checkbox', 'checkbox', '**In View (ActiveForm):**\r\n\r\n```\r\n use kartik\\widgets\\SwitchInput;\r\n\r\n<?= $form->field($model, ''publish'')->widget(SwitchInput::classname(), []); ?>\r\n```', 1, 1509179393, 1, 1509193621, '1'),
(5, 'CKEditor', '', '**In Module :**\r\n```\r\n\r\n    public function init() {\r\n            ...\r\n            $this->controllerMap = [\r\n            ''elfinder'' => [\r\n                ''class'' => ''mihaildev\\elfinder\\Controller'',\r\n                ''access'' => [''@''],\r\n                ''disabledCommands'' => [''netmount''],\r\n                ''roots'' => [\r\n                    [\r\n                        ''baseUrl'' => $this->mediaUrl,\r\n                        ''basePath'' => $this->mediaPath,\r\n                        ''path'' => '''',\r\n                        ''name'' => ''Global''\r\n                    ],\r\n                ],\r\n            ],\r\n        ];\r\n    }\r\n```\r\n**In View (ActiveForm):**\r\n```\r\n       use mihaildev\\ckeditor\\CKEditor;\r\n       use mihaildev\\elfinder\\ElFinder;\r\n\r\n       echo $form->field($model, ''full_text'')->widget(CKEditor::className(), [\r\n           ''editorOptions'' => ElFinder::ckeditorOptions(''blog/elfinder'', [/* Some CKEditor Options */\r\n         ]),\r\n       ]);\r\n    \r\n```\r\n', 1, 1509179647, 1, 1509181123, '1'),
(6, 'Module Trait', '', 'Trait module data and use it as a variant into controller and model \r\n\r\n**ModuleTrait.php :**\r\n```\r\n    namespace plathir\\smartblog\\backend\\traits;\r\n\r\n    use plathir\\smartblog\\backend\\Module;\r\n    use Yii;\r\n\r\n    /**\r\n     * Class ModuleTrait\r\n     * @package plathir\\smartblog\\traits\r\n     * Implements `getModule` method, to receive current module instance.\r\n     */\r\n    trait ModuleTrait\r\n    {\r\n        /**\r\n         * @var \\plathir\\smartblog\\backend\\Module|null Module instance\r\n         */\r\n        private $_module;\r\n\r\n        /**\r\n         * @return \\plathir\\smartblog\\backend\\Module|null Module instance\r\n         */\r\n        public function getModule()\r\n        {\r\n            if ($this->_module === null) {\r\n                $module = Module::getInstance();\r\n                if ($module instanceof Module) {\r\n                    $this->_module = $module;\r\n                } else {\r\n                    $this->_module = Yii::$app->getModule(''blog'');\r\n                }\r\n            }\r\n            return $this->_module;\r\n        }\r\n    }\r\n    \r\n```\r\n\r\n**Use trait In Model :**\r\n```\r\n  use plathir\\cropper\\behaviors\\UploadImageBehavior;\r\n\r\n  class Posts extends \\plathir\\smartblog\\common\\models\\Posts {\r\n\r\n    use \\plathir\\smartblog\\backend\\traits\\ModuleTrait;\r\n    \r\n    ...\r\n        public function behaviors() {\r\n        return [\r\n                ''uploadImageBehavior'' => [\r\n                    ''class'' => UploadImageBehavior::className(),\r\n                    ''attributes'' => [\r\n                        ''intro_image'' => [\r\n                            ''path'' => $this->module->ImagePath,\r\n                            ''temp_path'' => $this->module->ImageTempPath,\r\n                            ''url'' => $this->module->ImagePathPreview,\r\n                            ''key_folder'' => ''id'',\r\n                        ],\r\n                    ]\r\n                ]    \r\n        ]                    \r\n    ...        \r\n    \r\n```\r\n\r\n**Use module In Controller ( not with trait php file ) :**\r\n```\r\n    /**\r\n     * @property \\plathir\\smartblog\\backend\\Module $module\r\n     *\r\n     */\r\n    class PostsController extends Controller {\r\n\r\n        public function __construct($id, $module) {\r\n            parent::__construct($id, $module);\r\n        }\r\n    \r\n    ...\r\n    public function actions() {\r\n        $actions = [\r\n            ''error'' => [\r\n                ''class'' => ''yii\\web\\ErrorAction'',\r\n            ],\r\n            //Upload cropped image into temp directory\r\n            ''uploadphoto'' => [\r\n                ''class'' => ''\\plathir\\cropper\\actions\\UploadAction'',\r\n                ''width'' => 600,\r\n                ''height'' => 600,\r\n                ''thumbnail'' => true,\r\n                ''temp_path'' => $this->module->ImageTempPath,\r\n            ],    \r\n    \r\n```', 1, 1509180852, 1, 1509180896, '1'),
(7, 'Image Cropper', '', '**In Model:**\r\n```\r\n    use plathir\\cropper\\behaviors\\UploadImageBehavior;\r\n    ...\r\n    public function behaviors() {\r\n        return [\r\n          ....\r\n            ''uploadImageBehavior'' => [\r\n                ''class'' => UploadImageBehavior::className(),\r\n                ''attributes'' => [\r\n                    ''intro_image'' => [\r\n                        ''path'' => $this->module->ImagePath,\r\n                        ''temp_path'' => $this->module->ImageTempPath,\r\n                        ''url'' => $this->module->ImagePathPreview,\r\n                        ''key_folder'' => ''id'',\r\n                    ],\r\n                ]\r\n            ],   \r\n    ]     \r\n    \r\n```\r\n**In Controller**\r\n```\r\n     public function actions() {\r\n        $actions = [\r\n            ...\r\n            //Upload cropped image into temp directory\r\n            ''uploadphoto'' => [\r\n                ''class'' => ''\\plathir\\cropper\\actions\\UploadAction'',\r\n                ''width'' => 600,\r\n                ''height'' => 600,\r\n                ''thumbnail'' => true,\r\n                ''temp_path'' => $this->module->ImageTempPath,\r\n            ],           \r\n        ]\r\n    ]\r\n```\r\n**In View:**\r\n```\r\n        use plathir\\cropper\\Widget as NewWidget;\r\n        use yii\\helpers\\Url;\r\n\r\n        $form->field($model, ''intro_image'')->widget(NewWidget::className(), [\r\n            ''uploadUrl'' => Url::toRoute([''/blog/posts/uploadphoto'']),\r\n            ''previewUrl'' => $model->module->ImagePathPreview,\r\n            ''tempPreviewUrl'' => $model->module->ImageTempPathPreview,\r\n            ''KeyFolder'' => $model->id,\r\n            ''width'' => 200,\r\n            ''height'' => 200,\r\n        ]);        \r\n```    ', 1, 1509181091, 1, 1509181091, '1'),
(8, 'Button with  Tooltip', '', '```\r\n<?=\r\nHtml::a(Html::tag(''span'', ''<i class="fa fa-fw fa-plus"></i>'' . ''&nbsp'' . Yii::t(''app'', ''Create''), [\r\n            ''title'' => Yii::t(''app'', ''Create New Snippet''),\r\n            ''data-toggle'' => ''tooltip'',\r\n        ]), [''create''], [''class'' => ''btn btn-success btn-flat btn-loader''])\r\n?> \r\n```								', 1, 1509188699, 1, 1509191724, '1'),
(9, 'GridView with Timestamp Filter', '', '*Using in created_at , updated_at Unix Timestamp fields*\r\n\r\n**In View :**\r\n```\r\n\r\n<?=\r\nuse \\backend\\widgets\\SmartDate;\r\n\r\nGridView::widget([\r\n    ''dataProvider'' => $dataProvider,\r\n    ''filterModel'' => $searchModel,\r\n    ''columns'' => [\r\n...\r\n[\r\n    ''attribute'' => ''created_at'',\r\n    ''format'' => [''date'', ''php:'' . Yii::$app->settings->getSettings(''ShortDateFormat'')],\r\n    ''value'' => ''created_at'',\r\n    ''filter'' => SmartDate::widget([''type'' => ''filterShortDate'', ''model'' => $searchModel, ''attribute'' => ''created_at'']),\r\n    ''contentOptions'' => [''style'' => ''width: 12%;'']\r\n],\r\n...\r\n?>\r\n```\r\n\r\n**In Search Model :**\r\n```\r\npublic function rules() {\r\n        return [\r\n                 [[''created_at''], ''date'', ''format'' => Yii::$app->settings->getSettings(''ShortDateFormat''), ''message'' => ''{attribute} must be DD/MM/YYYY format.''],\r\n								 ...\r\n								 ]\r\n}\r\n		\r\npublic function search($params) {\r\n...\r\n\r\n        $query->andFilterWhere([''like'', ''description'', $this->description])\r\n                        ->andFilterWhere([''like'', "( FROM_UNIXTIME(snippets.created_at, ''" . Yii::$app->settings->getSettings(''DBShortDateFormat'') . " %h:%i:%s %p'' ))", $this->created_at])\r\n...\r\n        return $dataProvider;\r\n\r\n\r\n}\r\n```\r\n', 1, 1509189037, 1, 1509192810, '1'),
(10, 'Make common vendor folder for multiple applications', '', 'First create new folder for vendor :\r\n*** e.g. /var/www/frameworks/yii2 ***\r\n\r\nChange composer.json\r\n------------------\r\n** change vendor-dir  in config section**\r\n```\r\n    "config": {\r\n        "vendor-dir": "/var/www/frameworks/yii2",\r\n				...\r\n\r\n```\r\n\r\nChange common\\config\\main.php\r\n---------------------------\r\n** Change VendorPath :**\r\n```\r\nreturn [\r\n    //''vendorPath'' => dirname(dirname(__DIR__)) . ''/vendor'',\r\n    ''vendorPath'' => dirname(dirname(dirname(__DIR__))) . ''/frameworks/yii2'',\r\n```\r\n\r\nChange www\\index.php\r\n---------------------------\r\n** Change autoload.php and Yii.php path :**\r\n\r\n```\r\n//require(__DIR__ . ''/../vendor/autoload.php'');\r\n//require(__DIR__ . ''/../vendor/yiisoft/yii2/Yii.php'');\r\n\r\nrequire(__DIR__ . ''/../../frameworks/yii2/autoload.php'');\r\nrequire(__DIR__ . ''/../../frameworks/yii2/yiisoft/yii2/Yii.php'');\r\n\r\n```\r\n\r\n\r\nChange www\\admin\\index.php\r\n---------------------------\r\n** Change autoload.php and Yii.php path :**\r\n```\r\n//require(__DIR__ . ''/../../vendor/autoload.php'');\r\n//require(__DIR__ . ''/../../vendor/yiisoft/yii2/Yii.php'');\r\n\r\nrequire(__DIR__ . ''/../../../frameworks/yii2/autoload.php'');\r\nrequire(__DIR__ . ''/../../../frameworks/yii2/yiisoft/yii2/Yii.php'');\r\n```\r\n\r\nThen, delete the old vendor folder and run :\r\n```\r\ncomposer update\r\n```\r\n\r\nThats it !', 1, 1522391968, 1, 1522392949, '1'),
(11, 'test', '', '\r\n\r\n| Column 1 | Column 2 | Column 3 |\r\n| -------- | -------- | -------- |\r\n| Text     | Text     | Text     |\r\n\r\n\r\n\r\n\r\n| Column 1 | Column 2 | Column 3 |\r\n| -------- | -------- | -------- |\r\n| Text     | Text     | Text     |\r\n\r\n', 1, 1533192754, 1, 1533192789, '1');