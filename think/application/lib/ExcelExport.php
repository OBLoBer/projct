<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/28
 * Time: 18:43
 */
namespace app\lib;

function ExcelExport($Model,$where){
    ob_end_clean();
    header("Content-type:application/vnd.ms-excel;charset=UTF-8");
    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Type:application/force-download");
    header("Content-Type:application/vnd.ms-execl");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");;
    header('Content-Disposition:attachment;filename="入库明细表.xls"');
    header("Content-Transfer-Encoding:binary");
    $innerdata = Model($Model)->where($where)->select();
    $table = '';
    $table .= "'<html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\">
                        <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
                        <html>
                             <head>
                                <meta http-equiv=\"Content-type\" content=\"text/html;charset=UTF-8\" />
                                 <style id=\"Classeur1_16681_Styles\"></style>
                             </head>
                             <body>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class='name'>名称</th>
                                                <th class='name'>入库日期</th>
                                                <th class='name'>入库库位</th>
                                                <th class='name'>供货商</th>
                                                <th class='name'>入库人</th>
                                                <th class='name'>数量</th>
                                                <th class='name'>单价</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
    foreach ($innerdata as $v) {
        $table .= "<tr>
                                                <td class='name'>{$v['phone']}</td>
                                                <td class='name'>{$v['password']}</td>
                                                <td class='name'>{$v['qq']}</td>
                                                <td class='name'>{$v['cash']}</td>
                                                <td class='name'>{$v['phone']}</td>
                                                <td class='name'>{$v['point']}</td>
                                                <td class='name'>{$v['time']}</td>
                                            </tr>";
    }
    $table .= "</tbody></table></body></html>";
    echo $table;
}
