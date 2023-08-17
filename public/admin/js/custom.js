$(document).ready(function(){
    // Update Subadmin Status
    $(document).on("click",".updateSubadminStatus",function(){
        var status = $(this).children("i").attr("status");
        var subadmin_id = $(this).attr("subadmin_id");
        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/update-subadmin-status',
            data:{status:status,subadmin_id:subadmin_id},
            success:function(resp){
                if(resp['status']==0){
                    $("#subadmin-"+subadmin_id).html("<i class='fas fa-solid fa-toggle-off' style='color:grey;' status='Inactive'></i>")
                }else if(resp['status']==1){
                    $("#subadmin-"+subadmin_id).html("<i class='fas fa-solid fa-toggle-on' style='color:blue;' status='Active'></i>")
                }
            },error:function(){
                alert("Error");
            }
        })
    })

//     // Confirm the Deletion of CMS Page
//     $(document).on("click",".confirmDelete",finction(){
//         var name = $(this).attr('name');
//         if(confirm('Are you sure to delete this '+ name + '?')){
//             return true;
//         }
//         return false;
//     });
    // Confirm the Deletion with SweetAlrt
    $(document).on("click",".confirmDelete",function(){
        var record = $(this).attr('record');
        var recordid = $(this).attr('recordid');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
              window.location.href ="/admin/delete-" + record + "/" + recordid;
            }
          })
    });
});