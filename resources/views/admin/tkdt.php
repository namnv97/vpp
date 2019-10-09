<?php if($_SESSION['user_login']['role'] != 3) header('location: '.base_url.'admin'); ?>
<?php require view_cus.'admin/header.php'; ?>

<div id="thongke" class="container-fluid">
    <h3 class="text-center text-primary">THỐNG KÊ DOANH THU</h3>
    <div class="text-center">
        <div class="form-inline">
            <div class="form-group">
                <input type="number" name="month" id="" max="12" min="1" value="<?php echo date('m'); ?>" class="form-control w-25" > /
                <input type="number" name="year" id="" value="<?php echo date('Y'); ?>" class="form-control w-25">
                <input type="button" value="Xem" class="btn btn-warning" onclick="redraw()">
            </div>
        </div>
    </div>

    <div id="main-content">
        <!-- <h4>Doanh thu tháng</h4> -->
        
        <div id="chartContainer" style="height: 370px; width: 100%; margin-top:20px"></div>
    </div>
</div>

</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2019 <a href="#">VPP Developer</a>.</strong> All rights
    reserved.
  </footer>
<!-- <script type="text/javascript">
    var check_sv_base = "<?php echo base_url.'admin/checksv/'; ?>";
    var check_mh_base = "<?php echo base_url.'admin/checkmh/'; ?>";
</script> -->
<script type="text/javascript">
  var ajax_admin = "<?php echo base_url.'ajax/'; ?>";
</script>
<!-- <script src="<?php echo base_url; ?>js/jquery-1.9.1.js"></script> -->

<script src="<?php echo base_url; ?>js/admin/jquery-1.11.1.min.js"></script>

<script src="<?php echo base_url; ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url; ?>js/jQuery.data.min.js"></script>
<script src="<?php echo base_url; ?>js/admin/adminlte.min.js"></script>
<script src="<?php echo base_url; ?>ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url; ?>ckfinder/ckfinder.js"></script>
<script src="<?php echo base_url; ?>js/admin/config_ck.js"></script>
<script src="<?php echo base_url; ?>js/admin/custom.js"></script>


<script type="text/javascript" src="<?php echo base_url; ?>js/admin/jquery.canvasjs.min.js"></script>
<script>
    $(document).ready(function () {
        // redraw();
        var data = <?php echo $analysis; ?>;
        drawcus(data);
    });
    function redraw(){
        $.ajax({
            type: "post",
            url: ajax_admin+"tk_get_data",
            data: {
                month:$('[name=month]').val(),
                year: $('[name=year]').val()
            },
            dataType: "text",
            success: function (response) {
                console.log(response);
                draw(response)
            }
        });
    }
    function draw(data){
        data = JSON.parse(data)
        var _time = data.month+"/"+data.year
        var temp = []

        if(data.dataPoints.length==0){
            temp.push({
                y: 100,
                label: "Không bán sản phẩm nào"
            })
        }else{
            for (const key in data.dataPoints) {
                data.dataPoints[key].y = data.dataPoints[key].y.toFixed(3)
                temp.push(data.dataPoints[key])
                    // console.log(data.dataPoints[key]);
                }
            }
            
            var options = {
                title: {
                    text: "Doanh thu tháng " + _time,
                    fontFamily: "arial"
                },
                subtitles: [{
                    text: "Tổng doanh thu "+ data.total +" VND",
                    fontFamily: "arial"
                }],
                animationEnabled: true,
                data: [{
                    type: "pie",
                    startAngle: -90,
                    toolTipContent: "<b>{label}</b>: {y}%",
                    showInLegend: "true",
                    legendText: "{label}",
                    indexLabelFontSize: 16,
                    indexLabel: "{label} - {y}%",
                    dataPoints: temp,
                    indexLabelFontFamily: "arial"
                }]
            };
            var chart = new CanvasJS.Chart("chartContainer",options);
            chart.render();
        }

        function drawcus(data)
        {
            var _time = data.month+"/"+data.year
        var temp = []

        if(data.dataPoints.length==0){
            temp.push({
                y: 100,
                label: "Không bán sản phẩm nào"
            })
        }else{
            for (const key in data.dataPoints) {
                data.dataPoints[key].y = data.dataPoints[key].y.toFixed(3)
                temp.push(data.dataPoints[key])
                    // console.log(data.dataPoints[key]);
                }
            }
            
            var options = {
                title: {
                    text: "Doanh thu tháng " + _time,
                    fontFamily: "arial"
                },
                subtitles: [{
                    text: "Tổng doanh thu "+ data.total +" VND",
                    fontFamily: "arial"
                }],
                animationEnabled: true,
                data: [{
                    type: "pie",
                    startAngle: -90,
                    toolTipContent: "<b>{label}</b>: {y}%",
                    showInLegend: "true",
                    legendText: "{label}",
                    indexLabelFontSize: 16,
                    indexLabel: "{label} - {y}%",
                    dataPoints: temp,
                    indexLabelFontFamily: "arial"
                }]
            };
            var chart = new CanvasJS.Chart("chartContainer",options);
            chart.render();
        }
    </script>

</body>
</html>
