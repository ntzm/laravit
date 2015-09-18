<div class="btn-group" role="group">
    <button type="button" class="btn btn-{{ $previousVoteValue == 1 ? 'primary' : 'secondary' }}-outline" data-vote="1">
        <i class="fa fa-thumbs-up"></i>
    </button>
    <button type="button" class="btn btn-{{ $previousVoteValue == -1 ? 'primary' : 'secondary' }}-outline" data-vote="-1">
        <i class="fa fa-thumbs-down"></i>
    </button>
</div>
