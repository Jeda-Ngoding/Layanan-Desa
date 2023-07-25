<tr>
    <td class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;k&nbsp;&nbsp;&nbsp;</td>
    <td>Tanggal Izin Acara</td>
    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
    <td><?php echo date('D, d-M-Y H:i',strtotime($data['tanggal_acara'])) ?> s.d Selesai</td>
</tr>
<tr>
    <td class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;l&nbsp;&nbsp;&nbsp;</td>
    <td>Kegiatan</td>
    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
    <td><?php echo $data['keterangan']; ?></td>
</tr>