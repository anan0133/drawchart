<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':Attribute phải được chấp nhận.',
    'active_url'           => ':Attribute không phải là một URL hợp lệ.',
    'after'                => ':Attribute phải sau :date.',
    'after_or_equal'       => ':Attribute phải sau hoặc là :date.',
    'alpha'                => ':Attribute chỉ có thể chứa các chữ cái.',
    'alpha_dash'           => ':Attribute chỉ có thể chứa chữ cái, số và dấu gạch ngang.',
    'alpha_num'            => ':Attribute chỉ có thể chứa chữ cái và số.',
    'array'                => 'Kiểu dữ liệu của :attribute phải là dạng mảng.',
    'before'               => ':Attribute phải là một ngày trước ngày :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => ':Attribute phải nằm trong khoảng :min - :max.',
        'file'    => 'Dung lượng tập tin trong :attribute phải từ :min - :max kB.',
        'string'  => ':Attribute phải từ :min - :max ký tự.',
        'array'   => ':Attribute phải có từ :min - :max phần tử.',
    ],
    'boolean'              => ':Attribute phải là true hoặc false.',
    'confirmed'            => 'Giá trị xác nhận trong :attribute không khớp.',
    'date'                 => ':Attribute không phải là định dạng của ngày-tháng.',
    'date_format'          => ':Attribute không giống với định dạng :format.',
    'different'            => ':Attribute và :other phải khác nhau.',
    'digits'               => 'Độ dài của :attribute phải gồm :digits chữ số.',
    'digits_between'       => ':attribute là số lớn hơn 0, có ít nhất :min chữ số và có tối đa :max chữ số.',
    'dimensions'           => ':Attribute có kích thước không hợp lệ.',
    'distinct'             => ':Attribute có giá trị trùng lặp.',
    'email'                => ':Attribute phải là một địa chỉ email hợp lệ.',
    'exists'               => 'Giá trị đã chọn trong :attribute không hợp lệ.',
    'file'                 => ':Attribute phải là một tệp tin.',
    'filled'               => ':Attribute không được bỏ trống.',
    'image'                => ':Attribute phải là định dạng hình ảnh.',
    'in'                   => 'Giá trị đã chọn trong :attribute không hợp lệ.',
    'in_array'             => ':Attribute phải thuộc tập cho phép: :other.',
    'integer'              => ':Attribute phải là một số nguyên.',
    'ip'                   => ':Attribute phải là một địa chỉ IP.',
    'json'                 => ':Attribute phải là một chuỗi JSON.',
    'max'                  => [
        'numeric' => ':Attribute tối đa :max.',
        'file'    => 'Dung lượng tập tin trong :attribute không được lớn hơn :max kB.',
        'string'  => ':Attribute tối đa :max ký tự.',
        'array'   => ':Attribute tối đa :max phần tử.',
    ],
    'mimes'                => ':Attribute phải là một tập tin có định dạng: :values.',
    'mimetypes'            => ':Attribute phải là một tập tin có định dạng: :values.',
    'min'                  => [
        'numeric' => ':Attribute phải tối thiểu là :min.',
        'file'    => 'Dung lượng tập tin trong :attribute phải tối thiểu :min kB.',
        'string'  => ':Attribute phải có tối thiểu :min ký tự.',
        'array'   => ':Attribute phải có tối thiểu :min phần tử.',
    ],
    'not_in'               => 'Giá trị đã chọn trong :attribute không hợp lệ.',
    'numeric'              => ':Attribute phải là số.',
    'present'              => ':Attribute phải được cung cấp.',
    'regex'                => 'Định dạng :attribute không hợp lệ.',
    'required'             => ':Attribute không được bỏ trống.',
    'required_if'          => ':Attribute không được bỏ trống khi :other là :value.',
    'required_unless'      => ':Attribute không được bỏ trống trừ khi :other là :values.',
    'required_with'        => ':Attribute không được bỏ trống khi một trong :values có giá trị.',
    'required_with_all'    => ':Attribute không được bỏ trống khi tất cả :values có giá trị.',
    'required_without'     => ':Attribute không được bỏ trống khi một trong :values không có giá trị.',
    'required_without_all' => ':Attribute không được bỏ trống khi tất cả :values không có giá trị.',
    'same'                 => ':Attribute và :other phải giống nhau.',
    'size'                 => [
        'numeric' => ':Attribute phải bằng :size.',
        'file'    => 'Dung lượng tập tin trong :attribute phải bằng :size kB.',
        'string'  => ':Attribute phải chứa :size ký tự.',
        'array'   => ':Attribute phải chứa :size phần tử.',
    ],
    'string'               => ':Attribute phải là một chuỗi ký tự.',
    'timezone'             => ':Attribute phải là một múi giờ hợp lệ.',
    'unique'               => ':Attribute đã tồn tại trong hệ thống.',
    'uploaded'             => ':Attribute tải lên thất bại.',
    'url'                  => ':Attribute không giống với định dạng một URL.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [

        //user
            'name'                          => 'Tên',
            'email'                         => 'Email',
            'password'                      => 'Mật khẩu',
            'created_at'                    => 'Ngày tạo',
            'username'                      => 'Tên',
            'birthday'                      => 'Ngày sinh',
            'sex'                           => 'Giới tính',
            'file_avatar'                   => 'Hình đại diện',
            'newpass'                       => 'Mật khẩu mới',

        //menu item
            'type'                          => 'Thể loại nhạc',
            'link'                          => 'Đường dẫn',
            'singer'                        => 'Ca sĩ',
            'link'                          => 'Đường dẫn',
            

        //type
            'seo_name'                      => 'Tên SEO',
            'description'                   => 'Mô tả',
            'meta_tags'                     => 'Thẻ Meta',
            'total_articles'                => 'Tổng số bài viết',
            'seo_content'                   => 'Nội dung SEO',
            'thumbnail'                     => 'Hình ảnh',
            'slug'                          => 'Đường dẫn',

        //song 
            'title'                         => 'Tiêu đề',
            'intro'                         => 'Giới thiệu',
            'content'                       => 'Nội dung',
            'date'                          => 'Ngày xuất bản',
            'video_link'                    => 'Tệp video',
            'related_articles_id'           => 'Bài viết liên quan',
            'rate'                          => 'Đánh giá',
            'views'                         => 'Lượt xem',
            'author'                        => 'Nhạc sĩ',
            
            'file_thumbnail'                => 'Hình ảnh',
            'image'                         => 'Hình ảnh',
            'event_name'                    => 'Tên sự kiện',
            'event_link'                    => 'Đường dẫn sự kiện',

            'from'                          => 'Ngày bắt đầu',
            'to'                            => 'Ngày kết thúc',
            'song_title'                    => 'Tên bài hát',
            'singer_id'                     => 'Tên ca sĩ',
            'type_id'                       => 'Thể loại nhạc',
        //tags
            'safe_name'                     => 'Safe name tags',

        //setting
            'value'                         => 'Giá trị',
            'sort'                          => 'Thứ tự',
            'level'                         => 'Tên cấp độ',
            'target'                        => 'Số lượt views',

        //comment
            
        //advertisements 
            'customer'                      => 'Khách hàng',
            'link_pc'                       => 'Đường dẫn PC',
            'link_tb'                       => 'Đường dẫn tablet',
            'link_mb'                       => 'Đường dẫn mobile',
            'start_date'                    => 'Ngày bắt đầu',
            'end_date'                      => 'Ngày kết thúc',
            'link_href'                     => 'Đường dẫn',
            'file_link_pc'                  => 'Hình ảnh PC',
            'file_link_tb'                  => 'Hình ảnh tablet',
            'file_link_mb'                  => 'Hình ảnh mobile',
       //news
            'publish_day'                   => 'Ngày xuất bản',

        //contact
            'fullname'                      => 'Họ tên',
            'phone'                         => 'Số điện thoại',
            'address'                       => 'Địa chỉ',
    ],
    
];
