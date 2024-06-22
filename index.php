<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card">
                    <form action="" method="post" class="align-items-center">
                        <div class="card bg-white text-dark text-center">
                            <h3 class="pt-3">Rental Motor</h3>
                            <hr>
                            <div class="card-body">
                                <div>
                                    <label for="member">Masukkan Nama Anda</label>
                                    <input type="text" name="member" id="member" class="form-control my-3 py-1" required>


                                    <label for="lamaRental">Lama Sewa (per hari)</label>
                                    <input type="number" name="lamaRental" id="lamaRental" class="form-control my-3 py-1" required>


                                    <label for="jenis">Pilih Jenis Motor :</label>
                                    <select name="jenis" class="form-select mb-3" aria-label="Default select example" required>
                                        <option value="scooter">Scooter</option>
                                        <option value="sport">Sport</option>
                                        <option value="SportTouring">Sport Touring</option>
                                        <option value="Cross">Cross</option>
                                    </select>
                                    <div class="d-grid gap-2">
                                        <button type="submit" name="submit" class="btn btn-secondary">Submit</button>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <?php
                                    require 'logic.php';

                                    $proses = new rental();
                                    $proses->setHarga(70000, 90000, 90000, 100000);
                                    if (isset($_POST['submit'])) {
                                        $proses->member = $_POST['member'];
                                        $proses->jenis = $_POST['jenis'];
                                        $proses->waktu = $_POST['lamaRental'];

                                        $proses->pembayaran();
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modals -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Struk Anda</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                            <p><b>Nama : </b></p>
                            <p> <?= ucfirst($proses->member) ?></p>
                            <hr>
                            <p><b>Status :</b></p>
                            <p><?= $proses->getMember()?></p>
                            <hr>
                            <p><b>Diskon :</b></p>
                            <p><?= $proses->hargaRental()[1] . '%'?></p>
                            <hr>
                            <p><b>Lama Sewa (per Hari) :</b></p>
                            <p><?= $proses->waktu. ' hari'?></p>
                            <hr>
                            <p><b>Jenis Motor :</b></p>
                            <p><?= $proses->jenis?></p>
                            <hr>
                            <p><b>Total Harga :</b></p>
                            <p><?= 'Rp. ' .number_format($proses->hargaRental()[0],0,',','.')?></p>
                            <hr>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="window-print()">Print</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>