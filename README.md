# Codeigniter_Extentions

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
为Codeigniter框架编写的一些扩展

## 目录介绍

1. core：扩展Codeigniter的核心类编写的类。

 * MY_Controller.php：扩展CI的控制器，定义自己的控制器，实际应用中可以继承自己的控制器，并做在自己的控制器中一些预处理操作，比如后台权限认证，前台模板更换。

 * MY_Loader.php：扩展CI的加载器，使其能够改变视图加载目录，添加了开启皮肤功能和关闭皮肤功能供网站前台使用。

2. helpers：扩展Codeigniter的辅助函数。

 * MY_captcha_helper.php：扩展CI原有的验证码类，使生成的验证码直接输出并写入SESSION，然后销毁，解决了验证码生成过多占用系统资源问题。

3. libraries：扩展Codeigniter的类库。

 * Pagination：扩展CI的分页类，修改了其显示风格，使之显示对用户更加友好的信息。
