<?php

namespace App;

enum WeaponType: string
{
    
    // army weapons
    case Rifle = 'Rifle';
    case MachineGun = 'Machine Gun';
    case Mortar = 'Mortar';
    case Bazooka = 'Bazooka';
    case AntiTankGun = 'Anti-Tank Gun';
    case AntiAircraftGun = 'Anti-Aircraft Gun';
    case Flamethrower = 'Flamethrower';
    case Grenade = 'Grenade';
    case Landmine = 'Landmine';
    case Bayonet = 'Bayonet';
    case Pistol = 'Pistol';
    case SubmachineGun = 'Submachine Gun';
    case Shotgun = 'Shotgun';
    case SniperRifle = 'Sniper Rifle';
    case RocketLauncher = 'Rocket Launcher';
    case AntiPersonnelMine = 'Anti-Personnel Mine';
    case AntiTankMine = 'Anti-Tank Mine';
    case AntiAircraftMissile = 'Anti-Aircraft Missile';
    case AntiTankMissile = 'Anti-Tank Missile';
    case AntiShipMissile = 'Anti-Ship Missile';
    case AntiSubmarineMissile = 'Anti-Submarine Missile';
    case AntiRadiationMissile = 'Anti-Radiation Missile';
    case AntiSatelliteMissile = 'Anti-Satellite Missile';
    case AntiBallisticMissile = 'Anti-Ballistic Missile';
    case CruiseMissile = 'Cruise Missile';
    case IntercontinentalBallisticMissile = 'Intercontinental Ballistic Missile';
    case SurfaceToAirMissile = 'Surface-to-Air Missile';
    case SurfaceToSurfaceMissile = 'Surface-to-Surface Missile';
    case SurfaceToUnderwaterMissile = 'Surface-to-Underwater Missile';
    case AirToAirMissile = 'Air-to-Air Missile';
    case AirToSurfaceMissile = 'Air-to-Surface Missile';
    case AirToUnderwaterMissile = 'Air-to-Underwater Missile';
    case UnderwaterToSurfaceMissile = 'Underwater-to-Surface Missile';
    case UnderwaterToUnderwaterMissile = 'Underwater-to-Underwater Missile';
    case UnderwaterToAirMissile = 'Underwater-to-Air Missile';
    case SurfaceToAirRocket = 'Surface-to-Air Rocket';

    public static function getValues(): array
    {
        return [
            self::Rifle,
            self::MachineGun,
            self::Mortar,
            self::Bazooka,
            self::AntiTankGun,
            self::AntiAircraftGun,
            self::Flamethrower,
            self::Grenade,
            self::Landmine,
            self::Bayonet,
            self::Pistol,
            self::SubmachineGun,
            self::Shotgun,
            self::SniperRifle,
            self::RocketLauncher,
            self::AntiPersonnelMine,
            self::AntiTankMine,
            self::AntiAircraftMissile,
            self::AntiTankMissile,
            self::AntiShipMissile,
            self::AntiSubmarineMissile,
            self::AntiRadiationMissile,
            self::AntiSatelliteMissile,
            self::AntiBallisticMissile,
            self::CruiseMissile,
            self::IntercontinentalBallisticMissile,
            self::SurfaceToAirMissile,
            self::SurfaceToSurfaceMissile,
            self::SurfaceToUnderwaterMissile,
            self::AirToAirMissile,
            self::AirToSurfaceMissile,
            self::AirToUnderwaterMissile,
            self::UnderwaterToSurfaceMissile,
            self::UnderwaterToUnderwaterMissile,
            self::UnderwaterToAirMissile,
            self::SurfaceToAirRocket,
        ];
    }
    
}
