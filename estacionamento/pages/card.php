<div class="card">
              <!--div class="card-header">
                <h4 class="card-title"> Escolha um estacionamento </h4><!-- return do banco >
                <p class="category"> endereço?</p> <!-- aumentar fonte >
              </div -->
              <div class="card-body">
                <div class="table-responsive">
                  <?php
                  $query_markers = "SELECT name, address, vg_carro, vg_moto FROM markers";
                  $res_markers = mysqli_query($conn, $query_markers);
                  ?>
                  <table class="table"> 
                    <thead class=" text-primary">
                      <th>
                        Estacionamento
                      </th>
                      <th>
                        Endereço 
                      </th>
                      <th>
                        Vagas para carros <!-- quantidade e tipo, só mostrar as disponíveis -->
                      </th>
                      <th>
                        Vagas para motos 
                      </th>
                    </thead>
                    <tbody>
                    <?php while ($info_estac = mysqli_fetch_array($res_markers, MYSQLI_ASSOC)) {
                          $estac_id = $info_estac['id'];
                      ?> <!--  o objetivo é guardar o id do estacionamento na varável acima e enviar através do link pra página da reserva -->
                      <tr>
                        <td>
                          <!--?php echo '<a href="estac-espec.php?estac_id='. $estac_id .'>'. $info_estac['name'] . '</a>'; ?> -->
                          <a href="estac-espec.php"><?php echo $info_estac['name']; ?> </a>
                        </td>
                        <td>
                          <?php echo $info_estac['address']; ?>                        
                        </td>                        
                        <td>
                          <?php echo $info_estac['vg_carro']; ?>
                        </td>
                        <td>
                          <?php echo $info_estac['vg_moto']; ?>                         
                        </td>
                      </tr>
                      <?php } ?>
                      <!-- verificar o uso do break --> 
                      <!--
                      <tr>
                        <td>
                          Minerva Hooper
                        </td>
                        <td>
                          Curaçao
                        </td>
                        <td>
                          Sinaai-Waas
                        </td>
                        <td class="text-right">
                          $23,789
                        </td>
                      </tr>
                      -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
      </div>
      