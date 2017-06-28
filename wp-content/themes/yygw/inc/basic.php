<?php 
/**Other top page**/
$top_page_info = array(
  'full_name' => '基本设置',
  'optionname'=>'basic',
  'child'=>false,
  'filename' => 'basic_slug',
  'tab'=>true
);

$top_page_option = array();
$top_page_option[] = array(
  'name' => '组织名称',
  'id'   => 'org_name',
  'desc' => '输入组织名称，用于版权显示',
  'std'  => '',
  'type' => 'text'
);
$top_page_option[] = array(
  'name' => '组织地址',
  'id'   => 'org_address',
  'desc' => '输入组织地址',
  'std'  => '',
  'type' => 'text'
);
$top_page_option[] = array(
  'name' => '联系方式',
  'id'   => 'org_contact',
  'desc' => '输入联系方式',
  'std'  => '',
  'type' => 'text'
);
$top_page_option[] = array(
  'name' => 'E-mail',
  'id'   => 'org_email',
  'desc' => '输入邮箱',
  'std'  => '',
  'type' => 'text'
);
$top_page_option[] = array(
  'name' => '版权日期',
  'id'   => 'copy_date',
  'desc' => '输入版权登记日期',
  'std'  => '',
  'type' => 'text'
);
$top_page_option[] = array(
  'name' => '备案号',
  'id'   => 'copy_code',
  'desc' => '输入备案号',
  'std'  => '',
  'type' => 'text'
);
$top_page_option[] = array(
  'name' => '技术支持',
  'id'   => 'tech_org',
  'desc' => '输入技术支持公司',
  'std'  => '',
  'type' => 'text'
);
$top_page_option[] = array(
  'name' => 'logo上传',
  'id'   => 'logo',
  'desc' => '',
  'std'  => '',
  'button_text' => 'Upload',
  'type' => 'upload'
);
$top_page_option[] = array(
  'name' => '联系电话图片',
  'id'   => 'tel_pic',
  'desc' => '',
  'std'  => '',
  'button_text' => 'Upload',
  'type' => 'upload'
);
// $top_page_option[] = array(
//   'name' => 'ICP-备',
//   'id'   => 'org_date',
//   'desc' => '输入备案号',
//   'std'  => '',
//   'type' => 'text'
// );
// $top_page_option[] = array(
//   'name' => 'Textarea Example',
//   'id'   => 'child_textarea',
//   'desc' => 'Description or Notice',
//   'std'  => 'Default content',
//   'type' => 'textarea'
// );

$top_page = new ashuwp_options_feild($top_page_option, $top_page_info);

?>