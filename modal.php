<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="./add_story.php" method="POST" enctype="multipart/form-data">
                                    <label for="">Caption</label>
                                    <input type="text" name='caption' class='form-control'>
                                    <label for="">Image</label>
                                    <input type="file" name="image" class='form-control'>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Upload Story</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>