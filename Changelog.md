# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [v0.3.4]

### Changed
- Changed DecisionItem in ApiAgendaItem from Collection to Decision

## [v0.3.3]

### Added
- Added the composer.lock file to the repo. 

## [v0.3.2]

### Added
- Added Presentation, Documents and ItemDecision to ApiAgendaItem

### Changed
- Refactored the method FirstAgendaService::getCommitteesInOrganizations and 
  FirstAgendaService::getAllCommitteesAvailable to use private method.

## [v0.3.1]

### Changed
- Implemented the method getPDFDocumentUrl

## [v0.3.0]

### Added
- Added parameters handling to getAgendasByCommittee
- Added parameters handling to getAgendasByOrganization

## [v0.2.10]

### Added
- Added Getters to the class ApiCommittee

## [v0.2.9]

### Added
- Implemented the getAllCommitteesAvailable function

## [v0.2.8]

### Changed
- Fixed error in FirstAgendaService

## [v0.2.7]

### Added
- Added Getter methods to the ApiAgendaItem

### Removed
- Removed unused properties from ApiAgendaItem

## [v0.2.6]

### Changed
- Changed Agenda, AgendaItem, Committee to ApiAgenda, ApiItem, ApiCommittee.
- Renamed directory messages to Messages.

## [v0.2.5] - 2021-02-09

### Added
- Updated the method signature for both FirstAgendaService and TokenService, such that 
the ClientID and ClientSecret can be passed to the classes.

## [v0.2.4] - 2021-02-09

### Changed
- Moved test values to the ENV file.

## [v0.2.3] - 2021-01-22

###
- Added AgendaItems to the Agenda object.
- Implemented function FirstAgendaService@getAgendaItem and corresponding test case.

## [v0.2.2] - 2021-01-19

### Added
- Implemented function FirstAgendaService@getAgendasByOrganization and corresponding test case.


## [v0.2.1] - 2021-01-19

### Added
- Implemented function FirstAgendaService@getAgenda and corresponding test case.

## [v0.2.0] - 2021-01-19

### Added
- Added licence file

