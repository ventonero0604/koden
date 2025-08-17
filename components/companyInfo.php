<section class="Detail_about">
  <div class="Detail_wrapper">
    <h4 class="Detail_sectionTitle">事業概要</h4>
  </div>
  <table>
    <tbody>
      <tr>
        <th>会社名</th>
        <td><?php echo esc_html(get_field('company_name')); ?></td>
      </tr>
      <tr>
        <th>設立</th>
        <td><?php echo esc_html(get_field('established')); ?></td>
      </tr>
      <tr>
        <th>所在地</th>
        <td><?php echo esc_html(get_field('postalcode')); ?> <br class="sp"><?php echo esc_html(get_field('address')); ?></td>
      </tr>
      <tr>
        <th>代表取締役</th>
        <td><?php echo esc_html(get_field('name')); ?></td>
      </tr>
      <tr>
        <th>資本金</th>
        <td><?php echo esc_html(get_field('capital')); ?></td>
      </tr>
      <tr>
        <th>従業員数</th>
        <td><?php echo esc_html(get_field('employees')); ?></td>
      </tr>
      <tr>
        <th>ミッション</th>
        <td><?php echo esc_html(get_field('mission')); ?></td>
      </tr>
    </tbody>
  </table>
</section>