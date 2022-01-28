<?php

namespace App\Http\Presenters\Company;

use Illuminate\Database\Eloquent\Collection;

class CompanyListWithPaginationPresenter
{
//    public function __construct(
//        ProductArrayForOrderPresenter $productArrayForOrderPresenter,
//        WalletTypeAsArrayPresenter $walletTypeAsArrayPresenter,
//        UserArrayPresenter $userArrayPresenter
//    ) {
//        $this->productArrayForOrderPresenter = $productArrayForOrderPresenter;
//        $this->walletTypeAsArrayPresenter = $walletTypeAsArrayPresenter;
//        $this->userArrayPresenter = $userArrayPresenter;
//    }

    public function present(Collection $companyList): array
    {
        return $companyList->paginate();
    }

    public function presentCollection(Collection $collection): array
    {
        return $collection
            ->map(
                function (Order $order) {
                    return $this->present($order);
                }
            )
            ->all();
    }
}
