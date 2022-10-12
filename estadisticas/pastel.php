<div id="graficaPastel"></div>

<script>
    var data = [{
  values: [19, 26, 55],
  labels: ['Residential', 'Non-Residential', 'Utility'],
  type: 'pie'
}];

var layout = {
  height: 400,
  width: 500
};

Plotly.newPlot('graficaPastel', data, layout);

</script>