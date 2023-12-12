<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-12">
                    <?= $this->session->flashdata('pesan'); ?>
                    <?php echo form_open('belanja/update'); ?>
                    <table class="table table-bordered" cellpadding="6" cellspacing="1" style="width:100%">
                        <tr>
                            <th class="text-center" style="width: 130px;">QTY</th>
                            <th>Sepatu</th>
                            <th style="text-align:right">Harga</th>
                            <th style="text-align:right">Sub-Total</th>
                            <th class="text-center" style="width: 200px;">Hapus</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach ($this->cart->contents() as $items) : ?>
                            <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                            <tr>
                                <td><?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '2', 'type' => 'number', 'class' => 'form-control', 'min' => '0')); ?></td>
                                <td><?php echo $items['name']; ?></td>
                                <td style="text-align:right">IDR <?php echo $this->cart->format_number($items['price']); ?></td>
                                <td style="text-align:right">IDR <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('belanja/delete/' . $items['rowid']); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                        <tr class="text-right">
                            <td colspan="2" class="text-center">
                                <button type="submit" class="btn btn-primary ml-2"><i class="fas fa-edit"> </i> Update</button>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <h3 class="text-lg mx-auto"><strong>Total : </strong></h4>
                                    </div>
                                    <div class="col-sm-5">
                                        <span class="text-lg"><b>IDR <?php echo $this->cart->format_number($this->cart->total()); ?></b></span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-left">
                                <a href="<?= base_url('belanja/cekout'); ?>" class="btn btn-success"><i class="far fa-credit-card"> </i> Check Out</a>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('belanja/clear'); ?>" class="btn btn-danger ml-2"><i class="fas fa-sync-alt"> </i> Hapus Semua</a>
                            </td>
                        </tr>
                    </table>
                    <?php
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>