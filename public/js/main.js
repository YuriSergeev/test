$(document).ready(function(){
  $('form').on('submit', function(){
      if(this.id == 'delete' || this.id == 'condition' || this.id == 'delete_list' || this.id == 'listSize')
      {
        event.preventDefault();

        $.ajax({
          type: $(this).attr('method'),
          url: $(this).attr('action'),
          data: $(this).serialize(),
          success: function(result){
          }
        });

        this.id == 'delete' ? this.closest('table').remove() : this;
        this.id == 'delete_list' ? this.closest('.card').remove()  : this;
        this.querySelector('input').checked ? this.querySelector('input').checked = false : this.querySelector('input').checked = true;
      }
    });
});
