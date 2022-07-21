<?php

namespace App\Http\Controllers\Setting;


class Naql{


    public function renter($personAddress,$email,$mobile,$idTypeCode,$idNumber,$hijriBirthDate,$nationalityCode)
    {
       return [
        'renter' => [
            'personAddress' => $personAddress,
            'email'=>$email,
            'mobile'=>$mobile,
            'idTypeCode'=>$idTypeCode,
            'idNumber'=>$idNumber,
            'hijriBirthDate'=>$hijriBirthDate,
            'nationalityCode'=>$nationalityCode
        ]
        ];
    }
    public function paymentDetails($extraKmCost,
    $rentDayCost,$rentHourCost,$fullFuelCost,$driverFarePerDay,
    $driverFarePerHour,$vehicleTransferCost,$internationalAuthorizationCost,
    $discount,$paid,$extraDriverCost,$paymentMethodCode,$otherPaymentMethodCode,$additionalCoverageCost)
    {
       return [
        'paymentDetails' => [
            'extraKmCost' => $extraKmCost,
            'rentDayCost'=>$rentDayCost,
            'rentHourCost'=>$rentHourCost,
            'fullFuelCost'=>$fullFuelCost,
            'driverFarePerDay'=>$driverFarePerDay,
            'driverFarePerHour'=>$driverFarePerHour,
            'vehicleTransferCost'=>$vehicleTransferCost,
            'internationalAuthorizationCost' => $internationalAuthorizationCost,
            'discount'=>$discount,
            'paid'=>$paid,
            'extraDriverCost'=>$extraDriverCost,
            'paymentMethodCode'=>$paymentMethodCode,
            'otherPaymentMethodCode'=>$otherPaymentMethodCode,
            'additionalCoverageCost'=>$additionalCoverageCost
        ]
        ];
    }

    public function vehicleDetails($plateNumber,$firstChar,$secondChar,$thirdChar){
        return [
            'vehicleDetails' => [
                'plateNumber' => $plateNumber,
                'firstChar'=>$firstChar,
                'secondChar'=>$secondChar,
                'thirdChar'=>$thirdChar
            ]
            ];
    }
    public function rentStatus($ac,$carSeats,$fireExtinguisher,$firstAidKit,$keys,$radioStereo,$safetyTriangle,
            $screen,$spareTire,$spareTireTools,$speedometer,$tires,$sketchInfo,$notes,$availableFuel,$odometerReading,
            $other1,$other2,$oilChangeKmDistance,$enduranceAmount,$fuelTypeCode,$oilChangeDate,$oilType){
        return [
            'rentStatus' => [
                'ac' => $ac,
                'carSeats'=>$carSeats,
                'fireExtinguisher'=>$fireExtinguisher,
                'firstAidKit'=>$firstAidKit,
                'keys'=>$keys,
                'radioStereo'=>$radioStereo,
                'safetyTriangle'=>$safetyTriangle,
                'screen' => $screen,
                'spareTire'=>$spareTire,
                'spareTireTools'=>$spareTireTools,
                'speedometer'=>$speedometer,
                'tires'=>$tires,
                'sketchInfo'=>$sketchInfo,
                'notes'=>$notes,
                'availableFuel'=>$availableFuel,
                'odometerReading'=>$odometerReading,
                'other1'=>$other1,
                'other2'=>$other2,
                'oilChangeKmDistance'=>$oilChangeKmDistance,
                'enduranceAmount'=>$enduranceAmount,
                'fuelTypeCode'=>$fuelTypeCode,
                'oilChangeDate'=>$oilChangeDate,
                'oilType'=>$oilType,
            ]
            ];
    }
    public function extraDriver($idTypeCode,$personAddress,$idNumber,$birthDate){
        return [
            'extraDriver' => [
                'idTypeCode' => $idTypeCode,
                'personAddress'=>$personAddress,
                'idNumber'=>$idNumber,
                'birthDate'=>$birthDate
            ]
            ];
    }
    public function rentalApiGeneralInfo($extendedCoverageId,$workingBranchId,$rentPolicyId,$contractStartDate,$contractEndDate,
             $allowedKmPerHour,$receiveBranchId,$returnBranchId,$allowedKmPerDay,$contractTypeCode,$allowedLateHours){
        return [
            'rentalApiGeneralInfo' => [
                'extendedCoverageId' => $extendedCoverageId,
                'workingBranchId'=>$workingBranchId,
                'rentPolicyId'=>$rentPolicyId,
                'contractStartDate'=>$contractStartDate,
                'contractEndDate'=>$contractEndDate,
                'allowedKmPerHour'=>$allowedKmPerHour,
                 "receiveBranchId"=>$receiveBranchId,
                 "returnBranchId"=>$returnBranchId,
                 "allowedKmPerDay"=>$allowedKmPerDay,
                 "contractTypeCode"=>$contractTypeCode,
                 "allowedLateHours"=>$allowedLateHours
            ]
            ];
    }
    public function authorizationDetails($authorizationTypeCode,$authorizationEndDate,$tammExternalAuthorizationCountries){
        return [
            'authorizationDetails' => [
                'authorizationTypeCode' => $authorizationTypeCode,
                'authorizationEndDate'=>$authorizationEndDate,
                'tammExternalAuthorizationCountries'=>$tammExternalAuthorizationCountries
            ]
            ];
    }
    public function addtionalServices($carSeatPerDay,$disabilitiesAidsPerDay,$carDelivery,$navigationSystemPerDay,$internetPerDay){
        return [
            'addtionalServices' => [
                'carSeatPerDay' => $carSeatPerDay,
                'disabilitiesAidsPerDay'=>$disabilitiesAidsPerDay,
                'carDelivery'=>$carDelivery,
                'navigationSystemPerDay' => $navigationSystemPerDay,
                'internetPerDay'=>$internetPerDay
            ]
            ];
    }
    public function rentContractGeneralInfo($id,$contractNumber, $token){
        return[
            'rentContractGeneralInfo'=>[
                'id'=>$id,
                'contractNumber'=>$contractNumber,
                'token'=>$token
            ]
        ];
    }
    public function mainPaymentDetails($paid,$remaining, $total,$vat){
        return[
            'mainPaymentDetails'=>[
                'paid'=>$paid,
                'remaining'=>$remaining,
                'total'=>$total,
                'vat'=>$vat
            ]
        ];
    }
    public function otherPaymentDetails($paid,$remaining, $total,$vat){
        return[
            'otherPaymentDetails'=>[
                'paid'=>$paid,
                'remaining'=>$remaining,
                'total'=>$total,
                'vat'=>$vat
            ]
        ];
    }
    public function totalPaymentDetails($paid,$remaining, $total,$vat){
        return[
            'totalPaymentDetails'=>[
                'paid'=>$paid,
                'remaining'=>$remaining,
                'total'=>$total,
                'vat'=>$vat
            ]
        ];
    }

}
