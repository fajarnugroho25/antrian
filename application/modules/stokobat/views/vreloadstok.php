<head>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/config.js"></script>



</head>

<body>
    <div class="span10">
        <h3 class="page-title"> Reload Data Bulanan</h3>

        <div class="well">
            <form id="user" method="post" action="<?php echo base_url(); ?>stokobat/reloadtemp">

                <table>
                    <tr>
                        <td>
                            <label><b>Tanggal</b></label>
                        </td>
                        <td> &nbsp &nbsp</td>
                        <td>
                            <input type="text" class="form-control" id="tgl" name="tgl" required>
                        </td>

                        <td>
                            <label><b>Gudang</b></label>
                        </td>
                        <td> &nbsp &nbsp</td>
                        <td>
                            <select name="gudang" id="gudang">
                                <option value="1">Ranap</option>
                                <option value="79">Rajal</option>
                            </select>
                        </td>
                    </tr>

                </table>






                <div style="padding-top:20px">
                    <button class="btn btn-primary" id="simpan" type="submit" onclick="this.disabled='true';"> Reload Data</button>

                </div>
            </form>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>




</body>

</html>
<script>
    $('#input_mask').inputmask({
        mask: 'SJ-AAA-****-99999',
        definitions: {
            A: {
                validator: "[A-Za-z0-9 ]"
            },
        },
    });

    $("#tgl").inputmask("datetime", {
        mask: "1-2-y",
        placeholder: "dd-mm-yyyy",
        separator: "-",
        hourFormat: 12
    });
</script>