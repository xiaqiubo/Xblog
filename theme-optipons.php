<?php
 
    function getOptions() {
        $options = get_option('cnblogs_options');
        
        if (!is_array($options)) {
            $options['meta_keywords'] = '';
            update_option('cnblogs_options', $options);
        }
        return $options;
    }
 
    /* 初始化 */
    function init() {        
        if(isset($_POST['input_save'])) {
            $options = getOptions();
            $options['meta_keywords'] = stripslashes($_POST['meta_keywords']);
            update_option('cnblogs_options', $options);
        } else {
            getOptions();
        }
 
        add_theme_page("主题选项", "主题选项", 'edit_themes', basename(__FILE__),  'display');
    }
 
    /* 界面 */
    function display() {
        $options = getOptions();
?>
 
<form action="#" method="post" enctype="multipart/form-data" name="op_form" id="op_form">
    <div class="wrap">
        <h2>当前主题选项</h2>
        
        <table>
            <tbody>
                <tr>
                    <td>meta keywords</td>
                    <td>
                        <label>
                            <textarea name="meta_keywords" cols="50" rows="10" id="meta_keywords" style="width:98%;font-size:12px;" ><?php echo($options['meta_keywords']); ?></textarea>
                        </label>
                    </td>
                </tr>
            </tbody>
        </table>
 
        <p class="submit">
            <input type="submit" name="input_save" value="保存" />
        </p>
    </div>
 
</form>
 
<?php
    }
 
    add_action('admin_menu', 'init');
 
?>