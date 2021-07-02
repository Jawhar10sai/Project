USE [RAMEX]
GO

/****** Object:  Table [dbo].[pbcatvld]    Script Date: 28/12/2020 10:56:33 ******/
SET ANSI_NULLS OFF
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[pbcatvld](
	[pbv_name] [varchar](30) NOT NULL,
	[pbv_vald] [varchar](254) NOT NULL,
	[pbv_type] [smallint] NOT NULL,
	[pbv_cntr] [int] NULL,
	[pbv_msg] [varchar](254) NULL
) ON [PRIMARY]
GO
