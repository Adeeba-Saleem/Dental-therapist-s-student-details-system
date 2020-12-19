<table id="example" class="cell-border" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Grade</th>
                <th>School Name</th>
                <th>Month of Examined</th>
                <th>Disease</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($data)): ?>
                <?php foreach ($data as $details): ?>
                    <tr>
                        <td><?php echo strtoupper($details->name); ?></td>
                         <td><?php echo ucwords($details->grade); ?></td>
                          <td><?php echo ucwords($details->schoolName); ?></td>
                           <td><?php echo ucwords($details->month); ?></td>
                            <td><?php echo ucwords($details->disease); ?></td>
                            <td><a href="<?php echo BASEURL; ?>/profile/edit_details/<?php echo $details->id; ?>" class="btn btn-warning">Edit</a></td>
                            <td><a href="<?php echo BASEURL; ?>/profile/delete_details/<?php echo $details->id; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>

                <?php endforeach;?>

            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Grade</th>
                <th>School Name</th>
                <th>Month of Examined</th>
                <th>Disease</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </tfoot>
    </table>