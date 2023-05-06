        <?php if ($this->item instanceof Reservation) {
        ?>
        <table class="table table-bordered w-100 bg-primary-b m-auto mt-3 mb-3 border border-white text-tetiare-a">
            <thead class="text-center">
                <tr>
                    <th colspan="9" class="fs-3">Reservation</th>
                </tr>
                <tr>
                    <th class="col-2">Restaurant</th>
                    <th class="col-1">Nr of adults</th>
                    <th class="col-1">Nr of kids</th>
                    <th class="col-2">Datetime</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <td class="align-middle">
                    <?= $this->item->getRestaurant()->getName() ?>
                </td>
                <td class="align-middle">
                    <?= $this->item->getNrOfAdults() ?>
                </td>
                <td class="align-middle">
                    <?= $this->item->getNrOfKids() ?>
                </td>
                <td class="align-middle">
                    <?= $this->item->getDatetimeFormatted() ?>
                </td>
            </tr>
        </table>
        <?php }
            if($this->item instanceof TicketDance){ ?>
                <table class="table table-bordered w-100 bg-primary-b m-auto mt-3 mb-3 border border-white text-tetiare-a">
                    <thead class="text-center">
                        <tr>
                            <th colspan="9" class="fs-3">Ticke DANCE!</th>
                        </tr>
                        <tr>
                            <th class="col-2">Venue</th>
                            <th class="col-1">Artist</th>
                            <th class="col-1">Start</th>
                            <th class="col-1">End</th>
                            <th class="col-1">Nr of People</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <td class="align-middle">
                            <?= $this->item->getPerformance()->getVenue()->getName() ?>
                        </td>
                        <td class="align-middle">
                            <?= $this->item->getPerformance()->getArtist()->getName() ?>
                        </td>
                        <td class="align-middle">
                            <?= $this->item->getPerformance()->getStartDateFormatted() ?>
                        </td>
                        <td class="align-middle">
                            <?= $this->item->getPerformance()->getEndDateFormatted() ?>
                        </td>
                        <td class="align-middle">
                            <?= $this->item->getNrOfPeople() ?>
                        </td>
                    </tr>
                </table>
                <?php } ?>
            
                <?php if($this->item instanceof TicketHistory){ ?>
                <table class="table table-bordered w-100 bg-primary-b m-auto mt-3 mb-3 border border-white text-tetiare-a">
                    <thead class="text-center">
                        <tr>
                            <th colspan="9" class="fs-3">Reservation</th>
                        </tr>
                        <tr>
                            <th class="col-2">Restaurant</th>
                            <th class="col-1">Language</th>
                            <th class="col-1">Datetime</th>
                            <th class="col-2">Nr Of People</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <td class="align-middle">
                            <?= $this->item->getTour()->getGatheringLocation() ?>
                        </td>
                        <td class="align-middle">
                            <?= $this->item->getTour()->getLanguage() ?>
                        </td>
                        <td class="align-middle">
                            <?= $this->item->getTour()->getDatetimeFormatted() ?>
                        </td>
                        <td class="align-middle">
                            <?= $this->item->getNrOfPeople() ?>
                        </td>
                    </tr>
                </table>
                <?php } ?>