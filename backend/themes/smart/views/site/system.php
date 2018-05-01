<?php

use abhimanyu\systemInfo\SystemInfo;

// Get the class to work with the current operating system
$system = SystemInfo::getInfo();
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Yii::t('app', 'System Informations ') ?></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>

    </div><!-- /.box-header -->
    <div class="box-body">

        <table class="table table-striped">
            <tr>
                <th>Type</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Host Name</td>
                <td><?= $system::getHostname() ?></td>
            </tr>
            <tr>
                <td>Operating System</td>
                <td><?= $system::getOS() ?></td>
            </tr>
                <td>CPU Model</td>
                <td><?= $system::getCpuModel() ?></td>
            </tr>
            <tr>
                <td>CPU Vendor</td>
                <td><?= $system::getCpuVendor() ?></td>
            </tr>
            <tr>
                <td>CPU Frequency</td>
                <td><?= $system::getCpuFreq() ?></td>
            </tr>
            <tr>
                <td>CPU Cores</td>
                <td><?= $system::getCpuCores() ?></td>
            </tr>
            <tr>
                <td>Load</td>
                <td><?= $system::getLoad() ?></td>
            </tr>
            <tr>
                <td>PHP Version</td>
                <td><?= $system::getPhpVersion() ?></td>
            </tr>                    
            <tr>
                <td>Server Name</td>
                <td><?= $system::getServerName() ?></td>
            </tr>     
            <tr>
                <td>Server Protocol</td>
                <td><?= $system::getServerProtocol() ?></td>
            </tr>             
            <tr>
                <td>Server Software</td>
                <td><?= $system::getServerSoftware() ?></td>
            </tr>                        
            <tr>
                <td>Total Memory</td>
                <td><?= $system::getTotalMemory() ?></td>
            </tr>  
        </table>

    </div>
</div>




