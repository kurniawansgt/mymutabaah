<script type="text/javascript"> 
function deletedata(id, skip, search){ 
    var ask = confirm("Do you want to delete ID " + id + " ?");
    if (ask == true) {
        site = "index.php?model=aktifitas_kajian&action=deleteFormJQuery&skip=" + skip + "&search=" + search + "&id=" + id;
        target = "content";
        showMenu(target, site);
    }
}
function searchData() {
     var searchdata = document.getElementById("search").value;
     site =  'index.php?model=aktifitas_kajian&action=showAllJQuery&search='+searchdata;
     target = "content";
     showMenu(target, site);
}
$(document).ready(function(){
    $('#search').keypress(function(e) {
            if(e.which == 13) {
                searchData();
            }
    });
});
</script>

<h1>Aktifitas Kajian</h1>
<div id="header_list">
</div>
<table width="95%" >
    <tr>
        <td align="left">
            <img alt="Move First"  src="./img/icon/icon_move_first.gif" onclick="showMenu('content', 'index.php?model=aktifitas_kajian&action=showAllJQuery&search=<?php echo $search ?>');" >
            <img alt="Move Previous" src="./img/icon/icon_move_prev.gif" onclick="showMenu('content', 'index.php?model=aktifitas_kajian&action=showAllJQuery&skip=<?php echo $previous ?>&search=<?php echo $search ?>');">
            Page <?php echo $pageactive ?> / <?php echo $pagecount ?> 
            <img alt="Move Next" src="./img/icon/icon_move_next.gif" onclick="showMenu('content', 'index.php?model=aktifitas_kajian&action=showAllJQuery&skip=<?php echo $next ?>&search=<?php echo $search ?>');" >
            <img alt="Move Last" src="./img/icon/icon_move_last.gif" onclick="showMenu('content', 'index.php?model=aktifitas_kajian&action=showAllJQuery&skip=<?php echo $last ?>&search=<?php echo $search ?>');">
            <a href="index.php?model=aktifitas_kajian&action=export&search=<?php echo $search ?>">Export</a>
            <a href="index.php?model=aktifitas_kajian&action=printdata&search=<?php echo $search ?>" target="_"><img src="./images/icon_print.png"/></a>
        </td>
        <td align="right">
       <input type="text" name="search" id="search" value="<?php echo $search ?>">&nbsp;&nbsp;
       <input type="button" class="btn btn-info btn-sm" value="Cari" onclick="searchData()">
<?php if($isadmin || $ispublic || $isentry){ ?>
       <input type="button" class="btn btn-warning btn-sm" value="Data Baru" name="new" onclick="showMenu('header_list', 'index.php?model=aktifitas_kajian&action=showFormJQuery')"> 
<?php } ?>

        </td>
    </tr>
</table>
<table border="1"  cellpadding="2" style="border-collapse: collapse;" width="95%">
    <tr>
        <th class="textBold">ID</th>
        <th class="textBold">Tanggal Kajian</th>
        <th class="textBold">Lokasi Kajian</th>
        <th class="textBold">Mulai</th>
        <th class="textBold">Selesai</th>
        <th class="textBold">Materi Kajian</th>
        <th class="textBold">Pengisi</th>
        <th class="textBold">Jumlah Peserta</th>
        <td>&nbsp;</td>
    </tr>
    <?php
    
    $no = 1;
    
    if ($aktifitas_kajian_list != "") { 
        foreach($aktifitas_kajian_list as $aktifitas_kajian){
            $pi = $no + 1;
            $bg = ($pi%2 != 0) ? "#E1EDF4" : "#F0F0F0";
    ?>
            <tr bgcolor="<?php echo $bg;?>">
                <td><a href='#' onclick="showMenu('header_list', 'index.php?model=aktifitas_kajian&action=showDetailJQuery&id=<?php echo $aktifitas_kajian->getId();?>')"><?php echo $aktifitas_kajian->getId();?></a> </td>
                <td><?php echo $aktifitas_kajian->getTgl_kajian();?></td>
                <td><?php echo $aktifitas_kajian->getLokasi_kajian();?></td>
                <td><?php echo $aktifitas_kajian->getWaktu_mulai_kajian();?></td>
                <td><?php echo $aktifitas_kajian->getWaktu_selesai_kajian();?></td>
                <td><?php echo $aktifitas_kajian->getMateri_kajian();?></td>
                <td><?php echo $aktifitas_kajian->getPengisi_kajian();?></td>
                <td><?php echo $aktifitas_kajian->getJumlah_peserta();?></td>
                <td align="center" class="combobox">
                <?php if($isadmin || $ispublic || $isupdate){ ?>
                <a href='#' onclick="showMenu('header_list', 'index.php?model=aktifitas_kajian&action=showFormJQuery&id=<?php echo $aktifitas_kajian->getid();?>&skip=<?php echo $skip ?>&search=<?php echo $search ?>')">[Edit]</a> | 
                <?php } ?>
                <?php if($isadmin || $ispublic || $isdelete){ ?>
                <a href='#' onclick="deletedata('<?php echo $aktifitas_kajian->getId()?>','<?php echo $skip ?>','<?php echo $search ?>')">[Delete]</a>
                <?php } ?>
                </td>
            </tr>
    <?php
            $no++;
        }
    }
    ?>
</table>
<br>