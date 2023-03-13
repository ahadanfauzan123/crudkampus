
    function confirmAction(){
        let response = confirm('yakin ingin menghapus mahasiswa ?');
        if (response) {
            alert('terhapus');
        }
        else{
            document.getElementById('deleteform').onsubmit = () => {
                return false;
            }
            alert('gagal menghapus');
        }
    }